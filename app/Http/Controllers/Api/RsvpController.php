<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'template_slug' => 'required|string|max:100',
            'name'          => 'required|string|max:255',
            'status'        => 'required|in:Hadir,Tidak Hadir,Masih Ragu',
            'message'       => 'nullable|string|max:2000',
        ]);

        $rsvp = Rsvp::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Konfirmasi Anda sudah diterima.',
            'data'    => $rsvp,
        ], 201);
    }

    public function index(Request $request)
    {
        $request->validate([
            'slug'     => 'required|string',
            'per_page' => 'nullable|integer|min:1|max:50',
        ]);

        return Rsvp::where('template_slug', $request->slug)
            ->latest()
            ->paginate($request->per_page ?? 5);
    }
}
