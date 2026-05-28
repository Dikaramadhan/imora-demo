@extends('layouts.admin')

@section('content')
    {{-- ════════════════ SIDEBAR ════════════════ --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"><i class="bi bi-envelope-heart-fill"></i></div>
            <div>
                <span>Imora</span>
                <small>Admin Panel</small>
            </div>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-label">Utama</div>
            <a href="#" class="nav-item-link">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <div class="menu-label">Manajemen</div>
            <a href="{{ route('admin.undangan.index') }}" class="nav-item-link active">
                <i class="bi bi-card-image"></i> Template Undangan
            </a>
            <a href="#" class="nav-item-link">
                <i class="bi bi-people-fill"></i> Pengguna
            </a>
            <a href="#" class="nav-item-link">
                <i class="bi bi-bag-check-fill"></i> Pesanan
            </a>

            <div class="menu-label">Pengaturan</div>
            <a href="#" class="nav-item-link">
                <i class="bi bi-gear-fill"></i> Pengaturan
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                <div class="user-info">
                    <div class="name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="role">Super Admin</div>
                </div>
                <a href="{{ route('logout') }}" class="ms-auto text-white-50"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </aside>

    {{-- ════════════════ TOPBAR ════════════════ --}}
    <header class="topbar">
        <div class="topbar-left">
            <p class="page-title">Template Undangan</p>
            <nav aria-label="breadcrumb" class="mt-1">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                            style="color:var(--berry-primary)">Admin</a></li>
                    <li class="breadcrumb-item active text-muted">Template Undangan</li>
                </ol>
            </nav>
        </div>
        <div class="topbar-right">
            <button class="topbar-icon-btn">
                <i class="bi bi-search"></i>
            </button>
            <button class="topbar-icon-btn">
                <i class="bi bi-bell"></i>
                <span class="badge-dot"></span>
            </button>
            <button class="topbar-icon-btn">
                <i class="bi bi-gear"></i>
            </button>
            <div class="user-avatar ms-2" style="width:38px;height:38px;font-size:15px;cursor:pointer">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
        </div>
    </header>

    {{-- ════════════════ MAIN CONTENT ════════════════ --}}
    <main class="main-content">
        <div class="content-area">

            {{-- Flash message --}}
            @if (session('success'))
                <div class="alert alert-success alert-berry alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-berry alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ── STAT CARDS ── --}}
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon purple"><i class="bi bi-collection-fill"></i></div>
                        <div class="stat-info">
                            <div class="label">Total Template</div>
                            <div class="value">{{ $undangans->total() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon green"><i class="bi bi-toggle-on"></i></div>
                        <div class="stat-info">
                            <div class="label">Aktif</div>
                            <div class="value">{{ $totalAktif }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon orange"><i class="bi bi-star-fill"></i></div>
                        <div class="stat-info">
                            <div class="label">Populer</div>
                            <div class="value">{{ $totalPopuler }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon blue"><i class="bi bi-toggle-off"></i></div>
                        <div class="stat-info">
                            <div class="label">Nonaktif</div>
                            <div class="value">{{ $totalNonaktif }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── FILTER & SEARCH ── --}}
            <div class="filter-card">
                <form method="GET" action="{{ route('admin.undangan.index') }}">
                    <div class="row g-3 align-items-end">
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;color:#5e6e82">
                                <i class="bi bi-search me-1"></i> Cari Template
                            </label>
                            <input type="text" name="cari" class="form-control"
                                placeholder="Ketik nama template..." value="{{ request('cari') }}">
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;color:#5e6e82">
                                <i class="bi bi-tag me-1"></i> Kategori
                            </label>
                            <select name="kategori" class="form-select">
                                <option value="">Semua Kategori</option>
                                <option value="pernikahan" {{ request('kategori') === 'pernikahan' ? 'selected' : '' }}>
                                    Pernikahan</option>
                                <option value="khitanan" {{ request('kategori') === 'khitanan' ? 'selected' : '' }}>
                                    Khitanan</option>
                                <option value="ulang-tahun" {{ request('kategori') === 'ulang-tahun' ? 'selected' : '' }}>
                                    Ulang Tahun</option>
                                <option value="aqiqah" {{ request('kategori') === 'aqiqah' ? 'selected' : '' }}>
                                    Aqiqah</option>
                                <option value="lainnya" {{ request('kategori') === 'lainnya' ? 'selected' : '' }}>
                                    Lainnya</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label class="form-label fw-semibold" style="font-size:13px;color:#5e6e82">
                                <i class="bi bi-activity me-1"></i> Status
                            </label>
                            <select name="status" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="aktif" {{ request('status') === 'aktif' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="nonaktif" {{ request('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 d-flex gap-2">
                            <button type="submit" class="btn-berry-primary flex-grow-1">
                                <i class="bi bi-funnel-fill"></i> Filter
                            </button>
                            <a href="{{ route('admin.undangan.index') }}" class="btn-berry-outline">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                            <a href="{{ route('admin.undangan.create') }}" class="btn-berry-primary">
                                <i class="bi bi-plus-lg"></i> Tambah
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- ── TABLE ── --}}
            <div class="table-card">
                <div class="table-card-header">
                    <div>
                        <h5>Daftar Template</h5>
                        <p>Total {{ $undangans->total() }} template ditemukan</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-muted" style="font-size:12.5px">
                            Halaman {{ $undangans->currentPage() }} dari {{ $undangans->lastPage() }}
                        </span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Template</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Populer</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($undangans as $index => $undangan)
                                <tr>
                                    {{-- No --}}
                                    <td class="text-muted fw-semibold" style="font-size:12px">
                                        {{ $undangans->firstItem() + $index }}
                                    </td>

                                    {{-- Thumbnail + Nama --}}
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if ($undangan->thumbnail)
                                                <img src="{{ asset('storage/' . $undangan->thumbnail) }}"
                                                    alt="{{ $undangan->nama }}" class="thumbnail-img">
                                            @else
                                                <div class="thumbnail-placeholder">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="template-name">{{ $undangan->nama }}</div>
                                                <div class="template-slug">{{ $undangan->slug }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Kategori --}}
                                    <td>
                                        <span class="badge-kategori">{{ ucfirst($undangan->kategori) }}</span>
                                    </td>

                                    {{-- Harga --}}
                                    <td>
                                        @if ($undangan->harga == 0)
                                            <span class="price-free"><i class="bi bi-gift-fill me-1"></i>Gratis</span>
                                        @else
                                            <span class="price-text">Rp
                                                {{ number_format($undangan->harga, 0, ',', '.') }}</span>
                                        @endif
                                    </td>

                                    {{-- Populer toggle --}}
                                    <td>
                                        <button class="border-0 bg-transparent p-0 btn-toggle-populer"
                                            data-id="{{ $undangan->id }}"
                                            data-url="{{ route('admin.undangan.toggle-populer', $undangan) }}"
                                            title="{{ $undangan->is_populer ? 'Hapus dari populer' : 'Tandai populer' }}">
                                            @if ($undangan->is_populer)
                                                <span class="badge-populer"><i class="bi bi-star-fill"></i> Populer</span>
                                            @else
                                                <span class="badge-not-populer">Biasa</span>
                                            @endif
                                        </button>
                                    </td>

                                    {{-- Status toggle --}}
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input toggle-status" type="checkbox" role="switch"
                                                data-id="{{ $undangan->id }}"
                                                data-url="{{ route('admin.undangan.toggle-status', $undangan) }}"
                                                {{ $undangan->status === 'aktif' ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    {{-- Aksi --}}
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            @if ($undangan->preview_url)
                                                <a href="{{ $undangan->preview_url }}" target="_blank"
                                                    class="action-btn view" title="Preview">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.undangan.edit', $undangan) }}"
                                                class="action-btn edit" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <button class="action-btn delete btn-hapus" title="Hapus"
                                                data-id="{{ $undangan->id }}" data-nama="{{ $undangan->nama }}"
                                                data-url="{{ route('admin.undangan.destroy', $undangan) }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="bi bi-inbox"></i></div>
                                            <h6>Belum ada template</h6>
                                            <p>Template undangan yang kamu tambahkan akan muncul di sini.</p>
                                            <a href="{{ route('admin.undangan.create') }}" class="btn-berry-primary">
                                                <i class="bi bi-plus-lg"></i> Tambah Template
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($undangans->hasPages())
                    <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                        <p class="mb-0 text-muted" style="font-size:13px">
                            Menampilkan {{ $undangans->firstItem() }}–{{ $undangans->lastItem() }}
                            dari {{ $undangans->total() }} template
                        </p>
                        {{ $undangans->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>

        </div>{{-- /content-area --}}
    </main>

    {{-- ════════════════ MODAL HAPUS ════════════════ --}}
    <div class="modal fade" id="modalHapus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius:14px;overflow:hidden">
                <div class="modal-body text-center p-4">
                    <div
                        style="width:64px;height:64px;background:#fdecea;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:var(--berry-danger)">
                        <i class="bi bi-trash3-fill"></i>
                    </div>
                    <h5 class="fw-700 mb-1" style="color:#1a223f">Hapus Template?</h5>
                    <p class="text-muted mb-0" style="font-size:14px">
                        Template <strong id="modalNama"></strong> akan dihapus secara permanen.
                        Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center gap-2">
                    <button type="button" class="btn-berry-outline" data-bs-dismiss="modal">Batal</button>
                    <form id="formHapus" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-berry-primary" style="background:var(--berry-danger)">
                            <i class="bi bi-trash-fill"></i> Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const CSRF = document.querySelector('meta[name="csrf-token"]')?.content ??
            '{{ csrf_token() }}';

        // ── Toggle Status ──
        document.querySelectorAll('.toggle-status').forEach(toggle => {
            toggle.addEventListener('change', async function() {
                const url = this.dataset.url;
                try {
                    const res = await fetch(url, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': CSRF,
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    if (!data.success) this.checked = !this.checked;
                } catch {
                    this.checked = !this.checked;
                }
            });
        });

        // ── Toggle Populer ──
        document.querySelectorAll('.btn-toggle-populer').forEach(btn => {
            btn.addEventListener('click', async function() {
                const url = this.dataset.url;
                try {
                    const res = await fetch(url, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': CSRF,
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    if (data.success) {
                        if (data.is_populer) {
                            this.innerHTML =
                                '<span class="badge-populer"><i class="bi bi-star-fill"></i> Populer</span>';
                        } else {
                            this.innerHTML = '<span class="badge-not-populer">Biasa</span>';
                        }
                    }
                } catch (e) {
                    console.error(e);
                }
            });
        });

        // ── Hapus ──
        const modalHapus = new bootstrap.Modal(document.getElementById('modalHapus'));
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('modalNama').textContent = this.dataset.nama;
                document.getElementById('formHapus').action = this.dataset.url;
                modalHapus.show();
            });
        });
    </script>
@endsection
