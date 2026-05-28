@extends('layouts.admin')

@section('title', 'Tambah Template')

@section('content')
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-berry-muted mb-2">
            <a href="{{ route('admin.undangan.index') }}" class="hover:text-primary-600 transition-colors">Undangan</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-berry-dark font-medium">Tambah Baru</span>
        </div>
        <h1 class="text-2xl font-bold text-berry-dark">Tambah Template Baru</h1>
    </div>

    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.undangan.store') }}" enctype="multipart/form-data"
            class="bg-white rounded-berry shadow-card p-6 md:p-8 space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-semibold text-berry-dark mb-1.5">Nama Template <span
                        class="text-red-500">*</span></label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required maxlength="255"
                    placeholder="Contoh: Elegant Ivory"
                    class="w-full px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
                @error('nama')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori & Harga -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="kategori" class="block text-sm font-semibold text-berry-dark mb-1.5">Kategori <span
                            class="text-red-500">*</span></label>
                    <select id="kategori" name="kategori" required
                        class="w-full px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
                        <option value="">Pilih Kategori</option>
                        <option value="pernikahan" {{ old('kategori') === 'pernikahan' ? 'selected' : '' }}>Pernikahan
                        </option>
                        <option value="khitanan" {{ old('kategori') === 'khitanan' ? 'selected' : '' }}>Khitanan</option>
                        <option value="ulang_tahun" {{ old('kategori') === 'ulang_tahun' ? 'selected' : '' }}>Ulang Tahun
                        </option>
                        <option value="wisuda" {{ old('kategori') === 'wisuda' ? 'selected' : '' }}>Wisuda</option>
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="harga" class="block text-sm font-semibold text-berry-dark mb-1.5">Harga (Rp) <span
                            class="text-red-500">*</span></label>
                    <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required min="0"
                        placeholder="150000"
                        class="w-full px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
                    @error('harga')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-berry-dark mb-1.5">Deskripsi <span
                        class="text-red-500">*</span></label>
                <textarea id="deskripsi" name="deskripsi" required maxlength="1000" rows="4"
                    placeholder="Jelaskan keunggulan template ini..."
                    class="w-full px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all resize-y">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fitur (Dynamic) -->
            <div>
                <label class="block text-sm font-semibold text-berry-dark mb-1.5">Fitur Termasuk</label>
                <div id="fiturContainer" class="space-y-2">
                    @foreach (old('fitur', ['']) as $i => $f)
                        <div class="flex items-center gap-2 fitur-row">
                            <input type="text" name="fitur[]" value="{{ $f }}"
                                placeholder="Contoh: Animasi Opening"
                                class="flex-1 px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
                            <button type="button" onclick="removeFitur(this)"
                                class="w-9 h-9 flex items-center justify-center rounded-berry text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors flex-shrink-0">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="addFitur()"
                    class="inline-flex items-center gap-1.5 mt-3 px-4 py-2 text-primary-600 text-sm font-medium hover:bg-primary-50 rounded-berry transition-colors">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i> Tambah Fitur
                </button>
                @error('fitur.*')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thumbnail -->
            <div>
                <label for="thumbnail" class="block text-sm font-semibold text-berry-dark mb-1.5">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/webp"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-berry file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 file:cursor-pointer file:transition-colors">
                <p class="text-xs text-berry-muted mt-1">JPG, PNG, atau WebP. Maks 2MB.</p>
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Preview URL -->
            <div>
                <label for="preview_url" class="block text-sm font-semibold text-berry-dark mb-1.5">URL Preview
                    (opsional)</label>
                <input type="url" id="preview_url" name="preview_url" value="{{ old('preview_url') }}"
                    placeholder="https://demo.imora.id/elegant-ivory"
                    class="w-full px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
                @error('preview_url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status & Populer -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="status" class="block text-sm font-semibold text-berry-dark mb-1.5">Status <span
                            class="text-red-500">*</span></label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
                        <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_populer" value="1" {{ old('is_populer') ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-berry-border text-primary-600 focus:ring-primary-500/30 cursor-pointer">
                        <div>
                            <span class="text-sm font-semibold text-berry-dark">Tandai Populer</span>
                            <p class="text-xs text-berry-muted">Tampil di section populer</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 pt-4 border-t border-berry-border">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary-600 text-white font-semibold rounded-berry shadow-berry hover:shadow-berry-md hover:bg-primary-700 transition-all text-sm">
                    <i data-lucide="save" class="w-4 h-4"></i> Simpan Template
                </button>
                <a href="{{ route('admin.undangan.index') }}"
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-berry-bg text-gray-600 font-medium rounded-berry hover:bg-gray-200 transition-colors text-sm">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function addFitur() {
            const container = document.getElementById('fiturContainer');
            const row = document.createElement('div');
            row.className = 'flex items-center gap-2 fitur-row';
            row.innerHTML = `
            <input type="text" name="fitur[]" placeholder="Contoh: Animasi Opening" class="flex-1 px-4 py-2.5 bg-berry-bg border border-berry-border rounded-berry text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500 transition-all">
            <button type="button" onclick="removeFitur(this)" class="w-9 h-9 flex items-center justify-center rounded-berry text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors flex-shrink-0">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        `;
            container.appendChild(row);
            lucide.createIcons();
            row.querySelector('input').focus();
        }

        function removeFitur(btn) {
            const container = document.getElementById('fiturContainer');
            if (container.querySelectorAll('.fitur-row').length > 1) {
                btn.closest('.fitur-row').remove();
            }
        }
    </script>
@endpush
