<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Template Undangan — Imora Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --berry-primary: #5e35b1;
            --berry-primary-light: #ede7f6;
            --berry-secondary: #29b6f6;
            --berry-success: #66bb6a;
            --berry-warning: #ffa726;
            --berry-danger: #ef5350;
            --berry-info: #26c6da;
            --sidebar-bg: #1a223f;
            --sidebar-hover: #29314f;
            --sidebar-active: #5e35b1;
            --sidebar-width: 260px;
            --body-bg: #f8f9fa;
            --card-radius: 12px;
            --card-shadow: 0 2px 14px rgba(0, 0, 0, .08);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Public Sans', sans-serif;
            background: var(--body-bg);
            color: #2d3748;
            margin: 0;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--berry-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
        }

        .sidebar-brand span {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            letter-spacing: .3px;
        }

        .sidebar-brand small {
            display: block;
            font-size: 11px;
            color: rgba(255, 255, 255, .45);
            font-weight: 400;
            margin-top: 1px;
        }

        .sidebar-menu {
            padding: 16px 12px;
            flex: 1;
        }

        .menu-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .35);
            padding: 8px 12px 6px;
            margin-top: 8px;
        }

        .nav-item-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 8px;
            color: rgba(255, 255, 255, .65);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all .18s;
            margin-bottom: 2px;
        }

        .nav-item-link:hover {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .nav-item-link.active {
            background: var(--berry-primary);
            color: #fff;
            box-shadow: 0 4px 14px rgba(94, 53, 177, .35);
        }

        .nav-item-link i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255, 255, 255, .07);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--berry-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
        }

        .user-info .name {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .user-info .role {
            font-size: 11px;
            color: rgba(255, 255, 255, .45);
        }

        /* ── TOPBAR ── */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 99;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .04);
        }

        .topbar-left .breadcrumb {
            margin: 0;
            font-size: 13px;
        }

        .topbar-left .page-title {
            font-size: 17px;
            font-weight: 700;
            color: #1a223f;
            margin: 0;
            line-height: 1;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: none;
            background: var(--body-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5e6e82;
            font-size: 17px;
            cursor: pointer;
            transition: background .15s;
            position: relative;
        }

        .topbar-icon-btn:hover {
            background: #e9ecef;
        }

        .badge-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 8px;
            height: 8px;
            background: var(--berry-danger);
            border-radius: 50%;
            border: 2px solid #fff;
        }

        /* ── MAIN ── */
        .main-content {
            margin-left: var(--sidebar-width);
            padding-top: 64px;
            min-height: 100vh;
        }

        .content-area {
            padding: 28px;
        }

        /* ── STAT CARDS ── */
        .stat-card {
            background: #fff;
            border-radius: var(--card-radius);
            padding: 22px 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .1);
        }

        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .stat-icon.purple {
            background: var(--berry-primary-light);
            color: var(--berry-primary);
        }

        .stat-icon.green {
            background: #e8f5e9;
            color: var(--berry-success);
        }

        .stat-icon.orange {
            background: #fff3e0;
            color: var(--berry-warning);
        }

        .stat-icon.blue {
            background: #e1f5fe;
            color: var(--berry-secondary);
        }

        .stat-info .label {
            font-size: 13px;
            color: #8898aa;
            font-weight: 500;
            margin-bottom: 3px;
        }

        .stat-info .value {
            font-size: 26px;
            font-weight: 700;
            color: #1a223f;
            line-height: 1;
        }

        /* ── FILTER CARD ── */
        .filter-card {
            background: #fff;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            padding: 20px 24px;
            margin-bottom: 22px;
        }

        .filter-card .form-control,
        .filter-card .form-select {
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            font-size: 13.5px;
            padding: 9px 14px;
            transition: border-color .15s;
        }

        .filter-card .form-control:focus,
        .filter-card .form-select:focus {
            border-color: var(--berry-primary);
            box-shadow: 0 0 0 3px rgba(94, 53, 177, .12);
        }

        .btn-berry-primary {
            background: var(--berry-primary);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 9px 20px;
            font-size: 13.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .15s, box-shadow .15s;
            text-decoration: none;
        }

        .btn-berry-primary:hover {
            background: #4527a0;
            color: #fff;
            box-shadow: 0 4px 14px rgba(94, 53, 177, .3);
        }

        .btn-berry-outline {
            background: transparent;
            color: var(--berry-primary);
            border: 1.5px solid var(--berry-primary);
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 13.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all .15s;
            text-decoration: none;
        }

        .btn-berry-outline:hover {
            background: var(--berry-primary);
            color: #fff;
        }

        /* ── TABLE CARD ── */
        .table-card {
            background: #fff;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f3f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-card-header h5 {
            font-size: 15px;
            font-weight: 700;
            color: #1a223f;
            margin: 0;
        }

        .table-card-header p {
            font-size: 12.5px;
            color: #8898aa;
            margin: 2px 0 0;
        }

        .table {
            margin: 0;
            font-size: 13.5px;
        }

        .table thead th {
            background: #f8f9fc;
            color: #6e7d8c;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 13px 20px;
            border: none;
        }

        .table tbody td {
            padding: 14px 20px;
            vertical-align: middle;
            border-color: #f1f3f7;
            color: #3d4f6a;
        }

        .table tbody tr:hover td {
            background: #fafbff;
        }

        .thumbnail-img {
            width: 52px;
            height: 40px;
            object-fit: cover;
            border-radius: 7px;
            border: 1px solid #e9ecef;
        }

        .thumbnail-placeholder {
            width: 52px;
            height: 40px;
            background: var(--berry-primary-light);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--berry-primary);
            font-size: 16px;
        }

        .template-name {
            font-weight: 600;
            color: #1a223f;
            font-size: 13.5px;
        }

        .template-slug {
            font-size: 11.5px;
            color: #aab4c0;
            margin-top: 2px;
        }

        .badge-kategori {
            background: var(--berry-primary-light);
            color: var(--berry-primary);
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .price-text {
            font-weight: 700;
            color: #1a223f;
            font-size: 14px;
        }

        .price-free {
            color: var(--berry-success);
            font-weight: 700;
        }

        /* Toggle switch */
        .form-switch .form-check-input {
            width: 36px;
            height: 20px;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--berry-primary);
            border-color: var(--berry-primary);
        }

        /* Populer badge */
        .badge-populer {
            background: #fff8e1;
            color: #f59e0b;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .badge-not-populer {
            background: #f1f3f7;
            color: #aab4c0;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* Action buttons */
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            transition: all .15s;
            text-decoration: none;
        }

        .action-btn.edit {
            background: #e8f5e9;
            color: var(--berry-success);
        }

        .action-btn.edit:hover {
            background: var(--berry-success);
            color: #fff;
        }

        .action-btn.delete {
            background: #fdecea;
            color: var(--berry-danger);
        }

        .action-btn.delete:hover {
            background: var(--berry-danger);
            color: #fff;
        }

        .action-btn.view {
            background: #e1f5fe;
            color: var(--berry-secondary);
        }

        .action-btn.view:hover {
            background: var(--berry-secondary);
            color: #fff;
        }

        /* Empty state */
        .empty-state {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-state .empty-icon {
            width: 72px;
            height: 72px;
            background: var(--berry-primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: var(--berry-primary);
            margin: 0 auto 16px;
        }

        .empty-state h6 {
            font-weight: 700;
            color: #1a223f;
        }

        .empty-state p {
            font-size: 13.5px;
            color: #8898aa;
        }

        /* Alert flash */
        .alert-berry {
            border: none;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Pagination */
        .pagination .page-link {
            border-radius: 8px !important;
            margin: 0 2px;
            border: 1.5px solid #e2e8f0;
            color: #5e6e82;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 12px;
        }

        .pagination .page-item.active .page-link {
            background: var(--berry-primary);
            border-color: var(--berry-primary);
            color: #fff;
        }

        .pagination .page-link:hover {
            border-color: var(--berry-primary);
            color: var(--berry-primary);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 3px;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-berry-bg font-sans antialiased">

    <!-- ===== SIDEBAR ===== -->
    <aside id="sidebar"
        class="fixed top-0 left-0 bottom-0 w-64 bg-berry-dark text-white z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center gap-2.5 px-6 h-16 border-b border-white/10">
                <div
                    class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-berry flex items-center justify-center">
                    <span class="text-white font-bold text-xs">I</span>
                </div>
                <span class="text-lg font-bold tracking-tight">Imora Admin</span>
            </div>

            <!-- Nav -->
            <nav class="flex-1 px-4 py-5 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.undangan.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-berry text-sm font-medium bg-white/10 text-white">
                    <i data-lucide="layout-grid" class="w-4 h-4"></i>
                    Kelola Undangan
                </a>
                <a href="{{ route('katalog.index') }}" target="_blank"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-berry text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                    Lihat Katalog
                    <i data-lucide="arrow-up-right" class="w-3 h-3 ml-auto opacity-50"></i>
                </a>
            </nav>

            <!-- User -->
            <div class="px-4 py-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-berry text-sm text-gray-400 hover:text-red-400 hover:bg-white/5 transition-colors cursor-pointer">
                    @csrf
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <button type="submit">Keluar</button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Sidebar overlay (mobile) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- ===== MAIN AREA ===== -->
    <div class="lg:ml-64 min-h-screen flex flex-col">
        <!-- Top bar -->
        <header
            class="sticky top-0 z-20 bg-white/80 backdrop-blur-xl border-b border-berry-border h-16 flex items-center px-4 lg:px-8">
            <button onclick="toggleSidebar()"
                class="lg:hidden p-2 -ml-2 rounded-berry text-gray-600 hover:bg-berry-bg transition-colors">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>
            <div class="flex-1"></div>
            <div class="flex items-center gap-2 text-sm text-berry-muted">
                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4 text-primary-600"></i>
                </div>
                <span class="hidden sm:inline font-medium text-berry-dark">{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-4 lg:p-8">
            @if (session('success'))
                <div
                    class="mb-6 flex items-center gap-3 px-5 py-3.5 bg-green-50 border border-green-200 text-green-700 text-sm font-medium rounded-berry">
                    <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 flex-shrink-0"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div
                    class="mb-6 flex items-center gap-3 px-5 py-3.5 bg-red-50 border border-red-200 text-red-700 text-sm font-medium rounded-berry">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>

    @stack('scripts')
</body>

</html>
