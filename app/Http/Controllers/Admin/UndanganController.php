<?php

namespace App\Http\Controllers\Admin;

use App\Models\Undangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UndanganController extends Controller
{

    /**
     * List semua undangan di dashboard admin
     */
    public function index(Request $request)
    {
        $query = Undangan::query();

        // Filter pencarian
        if ($request->filled('cari')) {
            $query->where('nama', 'like', "%{$request->cari}%");
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $undangans = $query->orderByDesc('created_at')->paginate(10)->withQueryString();

        // Statistik ringkas
        $totalAktif = Undangan::where('status', 'aktif')->count();
        $totalPopuler = Undangan::where('is_populer', true)->count();
        $totalNonaktif = Undangan::where('status', 'nonaktif')->count();

        return view('admin.undangan.index', compact(
            'undangans',
            'totalAktif',
            'totalPopuler',
            'totalNonaktif'
        ));
    }

    /**
     * Form tambah undangan baru
     */
    public function create()
    {
        return view('admin.undangan.create');
    }

    /**
     * Simpan undangan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'harga'       => 'required|integer|min:0',
            'deskripsi'   => 'required|string|max:1000',
            'fitur'       => 'nullable|array',
            'fitur.*'     => 'nullable|string|max:100',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,webp,png|max:2048',
            'preview_url' => 'nullable|url|max:500',
            'status'      => 'required|in:aktif,nonaktif',
            'is_populer'  => 'nullable|boolean',
        ]);

        // Auto-generate slug
        $validated['slug'] = Str::slug($validated['nama']);

        // Cek slug duplikat
        if (Undangan::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $validated['slug'] . '-' . time();
        }

        // Handle upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = $validated['slug'] . '.' . $file->getClientOriginalExtension();
            $file->storeAs('undangan', $filename, 'public');
            $validated['thumbnail'] = 'undangan/' . $filename;
        }

        $validated['is_populer'] = $request->boolean('is_populer', false);

        Undangan::create($validated);

        return redirect()
            ->route('admin.undangan.index')
            ->with('success', "Template \"{$validated['nama']}\" berhasil ditambahkan.");
    }

    /**
     * Form edit undangan
     */
    public function edit(Undangan $undangan)
    {
        return view('admin.undangan.edit', compact('undangan'));
    }

    /**
     * Update undangan
     */
    public function update(Request $request, Undangan $undangan)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'harga'       => 'required|integer|min:0',
            'deskripsi'   => 'required|string|max:1000',
            'fitur'       => 'nullable|array',
            'fitur.*'     => 'nullable|string|max:100',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,webp,png|max:2048',
            'preview_url' => 'nullable|url|max:500',
            'status'      => 'required|in:aktif,nonaktif',
            'is_populer'  => 'nullable|boolean',
        ]);

        // Re-generate slug jika nama berubah
        $newSlug = Str::slug($validated['nama']);
        if ($newSlug !== $undangan->slug) {
            if (Undangan::where('slug', $newSlug)->where('id', '!=', $undangan->id)->exists()) {
                $newSlug = $newSlug . '-' . time();
            }
            $validated['slug'] = $newSlug;
        }

        // Handle upload thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus file lama
            if ($undangan->thumbnail && str_starts_with($undangan->thumbnail, 'undangan/')) {
                \Storage::disk('public')->delete($undangan->thumbnail);
            }
            $file = $request->file('thumbnail');
            $filename = $newSlug . '.' . $file->getClientOriginalExtension();
            $file->storeAs('undangan', $filename, 'public');
            $validated['thumbnail'] = 'undangan/' . $filename;
        }

        $validated['is_populer'] = $request->boolean('is_populer', false);

        $undangan->update($validated);

        return redirect()
            ->route('admin.undangan.index')
            ->with('success', "Template \"{$validated['nama']}\" berhasil diperbarui.");
    }

    /**
     * Hapus undangan
     */
    public function destroy(Undangan $undangan)
    {
        // Hapus file thumbnail
        if ($undangan->thumbnail && str_starts_with($undangan->thumbnail, 'undangan/')) {
            \Storage::disk('public')->delete($undangan->thumbnail);
        }

        $nama = $undangan->nama;
        $undangan->delete();

        return redirect()
            ->route('admin.undangan.index')
            ->with('success', "Template \"{$nama}\" berhasil dihapus.");
    }

    /**
     * Toggle status aktif/nonaktif (AJAX)
     */
    public function toggleStatus(Undangan $undangan)
    {
        $undangan->update([
            'status' => $undangan->status === 'aktif' ? 'nonaktif' : 'aktif',
        ]);

        return response()->json([
            'success' => true,
            'status'  => $undangan->status,
            'message' => "Status diubah ke \"{$undangan->status}\"",
        ]);
    }

    /**
     * Toggle populer (AJAX)
     */
    public function togglePopuler(Undangan $undangan)
    {
        $undangan->update([
            'is_populer' => !$undangan->is_populer,
        ]);

        return response()->json([
            'success'    => true,
            'is_populer' => $undangan->is_populer,
            'message'    => $undangan->is_populer ? 'Ditandai populer' : 'Dihapus dari populer',
        ]);
    }
}
