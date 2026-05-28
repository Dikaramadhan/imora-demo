@extends('layouts.app')

@section('title', 'Pesan Paket Custom | Imora')

@push('head')
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display:ital@0;1&family=Great+Vibes&family=Montserrat:wght@300;400;600&family=Josefin+Sans:wght@300;400;600&family=Raleway:wght@300;400;600&family=Lato:ital,wght@0,300;0,400;1,300&family=Libre+Baskerville:ital,wght@0,400;1,400&family=EB+Garamond:ital,wght@0,400;0,600;1,400"
        rel="stylesheet">
    <style>
        /* ===== WIZARD STEPPER ===== */
        .wizard-step {
            display: none;
        }

        .wizard-step.active {
            display: block;
            animation: stepIn 0.35s cubic-bezier(.4, 0, .2, 1) forwards;
        }

        @keyframes stepIn {
            from {
                opacity: 0;
                transform: translateX(24px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .wizard-step.leaving {
            animation: stepOut 0.25s ease forwards;
        }

        @keyframes stepOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(-24px);
            }
        }

        /* ===== STEPPER NAV ===== */
        .stepper-dot {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            background: white;
            color: #9ca3af;
            flex-shrink: 0;
        }

        .stepper-dot.done {
            background: #6366f1;
            border-color: #6366f1;
            color: white;
        }

        .stepper-dot.active {
            background: #6366f1;
            border-color: #6366f1;
            color: white;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .18);
        }

        .stepper-line {
            flex: 1;
            height: 2px;
            background: #e5e7eb;
            transition: background 0.3s;
        }

        .stepper-line.done {
            background: #6366f1;
        }

        /* ===== PHONE PREVIEW ===== */
        .phone-wrap {
            width: 240px;
            height: 440px;
            border-radius: 32px;
            border: 3px solid #1f2937;
            overflow: hidden;
            position: relative;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .06), 0 20px 60px rgba(0, 0, 0, .15), 0 4px 16px rgba(0, 0, 0, .08), inset 0 0 0 1px rgba(255, 255, 255, .1);
            transition: all 0.5s cubic-bezier(.34, 1.56, .64, 1);
        }

        .phone-wrap::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 5px;
            background: #1f2937;
            border-radius: 3px;
            z-index: 20;
        }

        .phone-wrap::after {
            content: '';
            position: absolute;
            top: 0;
            left: 15%;
            right: 15%;
            height: 40%;
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, transparent 100%);
            border-radius: 29px 29px 0 0;
            pointer-events: none;
            z-index: 15;
        }

        .preview-screen {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: background 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .preview-screen::after {
            content: '';
            position: absolute;
            inset: 0;
            box-shadow: inset 0 0 30px rgba(0, 0, 0, .04);
            pointer-events: none;
            z-index: 18;
            border-radius: 29px;
        }

        /* ===== LAYOUT MODES ===== */
        .layout-a .p-img {
            flex: 1.6;
            position: relative;
            overflow: hidden;
        }

        .layout-a .p-txt {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 14px 16px;
            gap: 4px;
            position: relative;
            z-index: 5;
        }

        .layout-b {
            flex-direction: row !important;
        }

        .layout-b .p-img {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .layout-b .p-txt {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 16px 14px;
            gap: 4px;
            position: relative;
            z-index: 5;
        }

        .layout-c .p-img {
            position: absolute;
            inset: 0;
        }

        .layout-c .p-txt {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 24px 16px 18px;
            background: linear-gradient(to top, rgba(0, 0, 0, .7) 0%, rgba(0, 0, 0, .3) 50%, transparent 100%);
            gap: 4px;
            z-index: 10;
        }

        /* ===== ORNAMENT SVG ===== */
        .ornament-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
        }

        /* ===== PHOTO MOCK ===== */
        .photo-mock {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.5s ease;
            position: relative;
        }

        .photo-mock-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 50%, rgba(0, 0, 0, .06));
            pointer-events: none;
        }

        /* ===== PREVIEW TEXT ===== */
        .p-hash {
            font-size: 8px;
            letter-spacing: .12em;
            opacity: .5;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            transition: color .4s;
        }

        .p-flourish {
            font-size: 10px;
            opacity: .3;
            line-height: 1;
            transition: color .4s;
        }

        .p-names {
            font-size: 20px;
            line-height: 1.25;
            transition: font-family .4s ease, color .4s ease;
            text-align: center;
            letter-spacing: .01em;
        }

        .layout-b .p-names {
            text-align: left;
            font-size: 16px;
        }

        .p-amp {
            font-family: 'Great Vibes', cursive;
            font-size: 1.3em;
            display: inline-block;
            opacity: .55;
            line-height: 1;
            margin: 1px 0;
        }

        .p-divider {
            width: 40px;
            height: 1px;
            opacity: .25;
            transition: background .4s, opacity .4s;
        }

        .layout-a .p-divider {
            margin: 0 auto;
        }

        .layout-b .p-divider {
            margin: 0;
        }

        .layout-c .p-divider {
            margin: 0 auto;
            background: rgba(255, 255, 255, .35) !important;
            opacity: 1 !important;
        }

        .p-date {
            font-size: 9px;
            letter-spacing: .06em;
            opacity: .65;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            transition: color .4s;
        }

        .layout-b .p-date,
        .layout-b .p-hash,
        .layout-b .p-flourish {
            text-align: left;
        }

        /* Layout C forced white */
        .layout-c .p-names {
            color: #fff !important;
            text-shadow: 0 1px 6px rgba(0, 0, 0, .3);
        }

        .layout-c .p-date {
            color: rgba(255, 255, 255, .8) !important;
        }

        .layout-c .p-hash {
            color: rgba(255, 255, 255, .5) !important;
        }

        .layout-c .p-flourish {
            color: rgba(255, 255, 255, .35) !important;
        }

        /* ===== OPT BUTTONS ===== */
        .opt-btn {
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            cursor: pointer;
            transition: all .2s ease;
            background: white;
        }

        .opt-btn:hover {
            border-color: #818cf8;
            background: #f5f3ff;
        }

        .opt-btn.active {
            border-color: #6366f1;
            background: #eef2ff;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
        }

        .opt-btn.active .opt-lbl {
            color: #4f46e5;
        }

        .opt-btn.error {
            border-color: #f87171 !important;
            background: #fff5f5 !important;
            animation: shake .3s ease;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-4px);
            }

            75% {
                transform: translateX(4px);
            }
        }

        .fitur-btn {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            cursor: pointer;
            transition: all .2s ease;
            background: white;
        }

        .fitur-btn:hover {
            border-color: #818cf8;
            background: #f5f3ff;
        }

        .fitur-btn.active {
            border-color: #6366f1;
            background: #eef2ff;
            color: #4f46e5;
        }

        .fitur-btn.active i {
            color: #6366f1 !important;
        }

        /* ===== FORM INPUT ===== */
        .form-input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 13px;
            color: #111827;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
            background: white;
        }

        .form-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .1);
        }

        .form-input::placeholder {
            color: #d1d5db;
        }

        .form-input.error {
            border-color: #f87171 !important;
            box-shadow: 0 0 0 3px rgba(248, 113, 113, .1) !important;
            animation: shake .3s ease;
        }

        /* ===== COLOR SWATCH ===== */
        .cswatch {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all .2s;
            position: relative;
            flex-shrink: 0;
        }

        .cswatch:hover {
            transform: scale(1.15);
        }

        .cswatch.active {
            border-color: #6366f1;
            box-shadow: 0 0 0 2px white, 0 0 0 4px #6366f1;
        }

        .cswatch.active::after {
            content: '✓';
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: white;
            font-weight: 700;
        }

        /* ===== PRICE BADGE ===== */
        .price-badge {
            transition: all .3s cubic-bezier(.34, 1.56, .64, 1);
        }

        /* ===== NAV BUTTONS ===== */
        .btn-next {
            background: #6366f1;
            color: white;
            border-radius: 14px;
            padding: 11px 22px;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all .2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-next:hover {
            background: #4f46e5;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, .3);
        }

        .btn-back {
            background: white;
            color: #6b7280;
            border-radius: 14px;
            padding: 11px 18px;
            font-size: 13px;
            font-weight: 600;
            border: 1.5px solid #e5e7eb;
            cursor: pointer;
            transition: all .2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-back:hover {
            border-color: #818cf8;
            color: #6366f1;
            background: #f5f3ff;
        }

        /* ===== FLOAT ANIM ===== */
        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        .float-anim {
            animation: floatY 4s ease-in-out infinite;
        }

        /* ===== SCROLLBAR HIDE ===== */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush

@section('content')
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-400 mb-6">
            <a href="{{ url('/') }}" class="hover:text-primary-600 transition-colors">Katalog</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-gray-700 font-medium">Pesan Custom</span>
        </nav>

        {{-- Header --}}
        <div class="mb-8">
            <div
                class="inline-flex items-center gap-2 px-3 py-1.5 bg-amber-50 text-amber-700 rounded-full text-xs font-semibold mb-3">
                <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Paket Custom
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Rancang Undangan Impianmu</h1>
            <p class="text-gray-500 text-sm max-w-lg">Ikuti langkah-langkah berikut dan lihat hasilnya langsung di preview.
            </p>
        </div>

        {{-- ===== STEPPER ===== --}}
        <div class="flex items-center gap-0 mb-8 px-1 overflow-x-auto scrollbar-hide" id="stepperNav">
            @php $steps = ['Acara','Font','Layout','Warna','Fitur','Kontak']; @endphp
            @foreach ($steps as $i => $s)
                <div class="stepper-dot {{ $i === 0 ? 'active' : '' }}" id="dot-{{ $i }}"
                    title="{{ $s }}">
                    <span id="dot-label-{{ $i }}">{{ $i + 1 }}</span>
                </div>
                @if (!$loop->last)
                    <div class="stepper-line" id="line-{{ $i }}"></div>
                @endif
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">

            {{-- ===== FORM ===== --}}
            <div class="lg:col-span-7">

                {{-- STEP 1: Acara --}}
                <div class="wizard-step active" id="step-0">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 bg-gray-50/80">
                            <div
                                class="w-7 h-7 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">
                                1</div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm">Data Acara</h2>
                                <p class="text-[11px] text-gray-400">Nama, tanggal, dan lokasi</p>
                            </div>
                        </div>
                        <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-gray-600 mb-2">Jenis Acara <span
                                        class="text-red-400">*</span></label>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2" id="jenisGroup">
                                    @foreach ([['Pernikahan', 'heart'], ['Khitanan', 'scissors'], ['Ulang Tahun', 'cake'], ['Wisuda', 'graduation-cap']] as [$v, $ic])
                                        <button type="button" onclick="pickJenis(this)" data-value="{{ $v }}"
                                            class="opt-btn flex flex-col items-center gap-1.5 py-3 px-2">
                                            <i data-lucide="{{ $ic }}" class="w-4 h-4 text-gray-400"></i>
                                            <span
                                                class="opt-lbl text-xs font-medium text-gray-600">{{ $v }}</span>
                                        </button>
                                    @endforeach
                                </div>
                                <p id="err-jenis" class="text-red-400 text-[11px] mt-1.5 hidden">Pilih jenis acara terlebih
                                    dahulu</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Pihak Pertama <span
                                        class="text-red-400">*</span></label>
                                <input type="text" id="nama1" placeholder="contoh: Rizky" maxlength="30"
                                    oninput="liveUpdate()" class="form-input">
                                <p id="err-nama1" class="text-red-400 text-[11px] mt-1 hidden">Nama tidak boleh kosong</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Pihak Kedua <span
                                        id="r2" class="text-red-400">*</span></label>
                                <input type="text" id="nama2" placeholder="contoh: Nisa" maxlength="30"
                                    oninput="liveUpdate()" class="form-input">
                                <p id="nama2note" class="text-[11px] text-gray-400 mt-1 hidden">Opsional untuk acara ini</p>
                                <p id="err-nama2" class="text-red-400 text-[11px] mt-1 hidden">Nama pasangan tidak boleh
                                    kosong</p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Tanggal Acara <span
                                        class="text-red-400">*</span></label>
                                <input type="date" id="tanggalAcara" oninput="liveUpdate()" class="form-input">
                                <p id="err-tgl" class="text-red-400 text-[11px] mt-1 hidden">Tanggal tidak boleh kosong
                                </p>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Lokasi Acara</label>
                                <input type="text" id="lokasi" placeholder="Gedung, Kota..." maxlength="80"
                                    class="form-input">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end"><button class="btn-next" onclick="goStep(1)">Lanjut: Pilih Font <i
                                data-lucide="arrow-right" class="w-4 h-4"></i></button></div>
                </div>

                {{-- STEP 2: Font --}}
                <div class="wizard-step" id="step-1">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 bg-gray-50/80">
                            <div
                                class="w-7 h-7 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">
                                2</div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm">Pilihan Font</h2>
                                <p class="text-[11px] text-gray-400">Klik untuk preview langsung</p>
                            </div>
                            <span id="selFontBadge"
                                class="ml-auto text-[11px] text-indigo-600 font-semibold hidden bg-indigo-50 px-2 py-0.5 rounded-lg"></span>
                        </div>
                        <div class="p-5 grid grid-cols-2 sm:grid-cols-3 gap-2.5" id="fontGroup">
                            @foreach ([['Playfair Display', "'Playfair Display',serif", 'Rizky & Nisa', 'Elegan Klasik'], ['Cormorant Garamond', "'Cormorant Garamond',serif", 'Rizky & Nisa', 'Romantis Mewah'], ['Great Vibes', "'Great Vibes',cursive", 'Rizky & Nisa', 'Kaligrafi Halus'], ['Montserrat', "'Montserrat',sans-serif", 'RIZKY & NISA', 'Modern Bersih'], ['Josefin Sans', "'Josefin Sans',sans-serif", 'RIZKY & NISA', 'Minimalis Tegas'], ['Raleway', "'Raleway',sans-serif", 'Rizky & Nisa', 'Kontemporer'], ['EB Garamond', "'EB Garamond',serif", 'Rizky & Nisa', 'Klasik Hangat'], ['Libre Baskerville', "'Libre Baskerville',serif", 'Rizky & Nisa', 'Formal Elegan'], ['Lato', "'Lato',sans-serif", 'Rizky & Nisa', 'Simpel Bersih']] as [$n, $css, $prev, $tag])
                                <button type="button"
                                    onclick="pickFont('{{ $css }}','{{ $n }}',this)"
                                    data-font="{{ $css }}" class="opt-btn text-left p-3 group">
                                    <div class="text-[17px] leading-tight text-gray-800 mb-1 group-hover:text-indigo-700 transition-colors"
                                        style="font-family:{{ $css }}">{{ $prev }}</div>
                                    <div class="text-[10px] text-gray-400 font-medium">{{ $n }}</div>
                                    <div class="text-[10px] text-gray-300">{{ $tag }}</div>
                                </button>
                            @endforeach
                        </div>
                        <p id="err-font" class="text-red-400 text-[11px] px-5 pb-4 hidden">Pilih font terlebih dahulu</p>
                    </div>
                    <div class="flex gap-2 justify-between">
                        <button class="btn-back" onclick="goStep(0)"><i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Kembali</button>
                        <button class="btn-next" onclick="goStep(2)">Lanjut: Tata Letak <i data-lucide="arrow-right"
                                class="w-4 h-4"></i></button>
                    </div>
                </div>

                {{-- STEP 3: Layout --}}
                <div class="wizard-step" id="step-2">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 bg-gray-50/80">
                            <div
                                class="w-7 h-7 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">
                                3</div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm">Tata Letak</h2>
                                <p class="text-[11px] text-gray-400">Posisi foto dan teks</p>
                            </div>
                        </div>
                        <div class="p-5 grid grid-cols-3 gap-3" id="layoutGroup">
                            <button type="button" onclick="pickLayout('a',this)" class="opt-btn p-3">
                                <div
                                    class="w-full h-20 bg-gray-50 rounded-lg flex flex-col gap-1 p-2 mb-2 overflow-hidden border border-gray-100">
                                    <div class="rounded flex-[2]"
                                        style="background:linear-gradient(135deg,#e0d7f7,#c4b5e8)"></div>
                                    <div class="bg-gray-200 rounded h-2 w-3/4 mx-auto"></div>
                                    <div class="bg-gray-100 rounded h-1.5 w-1/2 mx-auto"></div>
                                </div>
                                <p class="opt-lbl text-[11px] font-semibold text-gray-700">Layout A</p>
                                <p class="text-[10px] text-gray-400">Foto atas, teks bawah</p>
                            </button>
                            <button type="button" onclick="pickLayout('b',this)" class="opt-btn p-3">
                                <div
                                    class="w-full h-20 bg-gray-50 rounded-lg flex gap-1.5 p-2 mb-2 overflow-hidden border border-gray-100">
                                    <div class="rounded flex-1"
                                        style="background:linear-gradient(135deg,#e0d7f7,#c4b5e8)"></div>
                                    <div class="flex flex-col gap-1 flex-1 justify-center">
                                        <div class="bg-gray-200 rounded h-2"></div>
                                        <div class="bg-gray-100 rounded h-1.5 w-3/4"></div>
                                        <div class="bg-gray-100 rounded h-1.5 w-1/2"></div>
                                    </div>
                                </div>
                                <p class="opt-lbl text-[11px] font-semibold text-gray-700">Layout B</p>
                                <p class="text-[10px] text-gray-400">Foto kiri, teks kanan</p>
                            </button>
                            <button type="button" onclick="pickLayout('c',this)" class="opt-btn p-3">
                                <div class="w-full h-20 rounded-lg relative overflow-hidden mb-2 border border-gray-100"
                                    style="background:linear-gradient(135deg,#c4b5e8,#9f86d9)">
                                    <div class="absolute inset-0"
                                        style="background:linear-gradient(to top,rgba(0,0,0,.5) 0%,transparent 60%)"></div>
                                    <div class="absolute bottom-2 left-0 right-0 flex flex-col gap-1 items-center">
                                        <div class="bg-white/70 rounded h-2 w-1/2"></div>
                                        <div class="bg-white/40 rounded h-1.5 w-1/3"></div>
                                    </div>
                                </div>
                                <p class="opt-lbl text-[11px] font-semibold text-gray-700">Layout C</p>
                                <p class="text-[10px] text-gray-400">Full background foto</p>
                            </button>
                        </div>
                        <p id="err-layout" class="text-red-400 text-[11px] px-5 pb-4 hidden">Pilih tata letak terlebih
                            dahulu</p>
                    </div>
                    <div class="flex gap-2 justify-between">
                        <button class="btn-back" onclick="goStep(1)"><i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Kembali</button>
                        <button class="btn-next" onclick="goStep(3)">Lanjut: Tema Warna <i data-lucide="arrow-right"
                                class="w-4 h-4"></i></button>
                    </div>
                </div>

                {{-- STEP 4: Warna --}}
                <div class="wizard-step" id="step-3">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 bg-gray-50/80">
                            <div
                                class="w-7 h-7 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">
                                4</div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm">Tema Warna</h2>
                                <p class="text-[11px] text-gray-400">Warna dominan undangan</p>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-wrap gap-3 mb-3">
                                @foreach ([['Sage Green', '#7C9E87', '#fff'], ['Dusty Rose', '#C9909C', '#fff'], ['Navy Blue', '#2C3E6B', '#fff'], ['Champagne', '#C8A96E', '#fff'], ['Burgundy', '#7B2D42', '#fff'], ['Slate', '#5B6B7A', '#fff'], ['Blush', '#E8C4C4', '#7B2D42'], ['Forest', '#3D6B4A', '#fff']] as [$lbl, $hex, $txt])
                                    <button type="button"
                                        onclick="pickColor('{{ $hex }}','{{ $lbl }}','{{ $txt }}',this)"
                                        title="{{ $lbl }}" class="cswatch"
                                        style="background:{{ $hex }}"></button>
                                @endforeach
                                <button type="button" onclick="toggleCustomClr(this)" title="Custom"
                                    class="cswatch flex items-center justify-center"
                                    style="background:white;border:2px dashed #d1d5db">
                                    <i data-lucide="plus" class="w-3.5 h-3.5 text-gray-400"></i>
                                </button>
                            </div>
                            <div id="colorLabel" class="hidden text-xs text-gray-500 mb-2">Dipilih: <span
                                    id="colorLabelText" class="font-semibold text-indigo-600"></span></div>
                            <div id="customClrWrap" class="hidden">
                                <input type="text" id="customClrInput"
                                    placeholder="Nama warna / kode hex, contoh: Gold #D4AF37" class="form-input"
                                    maxlength="60">
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 justify-between">
                        <button class="btn-back" onclick="goStep(2)"><i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Kembali</button>
                        <button class="btn-next" onclick="goStep(4)">Lanjut: Fitur <i data-lucide="arrow-right"
                                class="w-4 h-4"></i></button>
                    </div>
                </div>

                {{-- STEP 5: Fitur --}}
                <div class="wizard-step" id="step-4">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 bg-gray-50/80">
                            <div
                                class="w-7 h-7 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">
                                5</div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm">Fitur Tambahan</h2>
                                <p class="text-[11px] text-gray-400">Pilih semua yang kamu inginkan</p>
                            </div>
                            <span id="fiturBadge"
                                class="ml-auto text-[11px] bg-indigo-100 text-indigo-600 font-bold px-2 py-0.5 rounded-full hidden">0</span>
                        </div>
                        <div class="p-5 grid grid-cols-2 sm:grid-cols-3 gap-2">
                            @foreach ([['map-pin', 'Peta & Navigasi', 0], ['music', 'Musik Latar', 0], ['calendar-check', 'RSVP Online', 0], ['image', 'Galeri Foto & Video', 0], ['timer', 'Countdown Timer', 0], ['qr-code', 'QR Code Tamu', 0], ['message-circle', 'Guestbook Digital', 0], ['users', 'Multi-Acara', 15000], ['link', 'Custom Slug URL', 0]] as [$ic, $lbl, $extra])
                                <button type="button" onclick="toggleFitur(this)" data-value="{{ $lbl }}"
                                    data-extra="{{ $extra }}"
                                    class="fitur-btn flex items-center gap-2 px-3 py-2.5 text-xs text-gray-600 font-medium text-left">
                                    <i data-lucide="{{ $ic }}"
                                        class="w-3.5 h-3.5 flex-shrink-0 text-gray-400"></i>
                                    <span>{{ $lbl }}</span>
                                    @if ($extra > 0)
                                        <span class="ml-auto text-[10px] text-green-600 font-semibold">+Rp
                                            {{ number_format($extra, 0, ',', '.') }}</span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div
                        class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl border border-indigo-100 p-4 mb-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-indigo-600 font-semibold mb-0.5">Estimasi Total</p>
                                <p class="text-[11px] text-gray-400">Harga dapat berubah setelah konfirmasi</p>
                            </div>
                            <div class="text-right">
                                <div class="price-badge text-2xl font-bold text-indigo-700" id="priceDisplay">Rp 250.000
                                </div>
                                <div id="priceBreakdown" class="text-[10px] text-gray-400 mt-0.5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 justify-between">
                        <button class="btn-back" onclick="goStep(3)"><i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Kembali</button>
                        <button class="btn-next" onclick="goStep(5)">Lanjut: Kontak <i data-lucide="arrow-right"
                                class="w-4 h-4"></i></button>
                    </div>
                </div>

                {{-- STEP 6: Kontak --}}
                <div class="wizard-step" id="step-5">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100 bg-gray-50/80">
                            <div
                                class="w-7 h-7 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">
                                6</div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm">Kontak & Catatan</h2>
                                <p class="text-[11px] text-gray-400">Untuk konfirmasi via WhatsApp</p>
                            </div>
                        </div>
                        <div class="p-5 space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nama Pemesan <span
                                            class="text-red-400">*</span></label>
                                    <input type="text" id="namaPemesan" placeholder="Nama lengkap" maxlength="60"
                                        class="form-input">
                                    <p id="err-pemesan" class="text-red-400 text-[11px] mt-1 hidden">Nama pemesan tidak
                                        boleh kosong</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Nomor WhatsApp <span
                                            class="text-red-400">*</span></label>
                                    <input type="tel" id="noWa" placeholder="08xxxxxxxxxx" maxlength="15"
                                        class="form-input">
                                    <p id="err-wa" class="text-red-400 text-[11px] mt-1 hidden">Nomor WhatsApp tidak
                                        boleh kosong</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Referensi / Catatan
                                    Tambahan</label>
                                <textarea id="catatan" rows="3" maxlength="500"
                                    placeholder="Inspirasi desain, link referensi, atau hal lain..."
                                    oninput="document.getElementById('cCount').textContent=this.value.length" class="form-input resize-none"></textarea>
                                <p class="text-[11px] text-gray-400 mt-1 text-right"><span id="cCount">0</span>/500</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-bold text-gray-700 mb-3 flex items-center gap-1.5">
                                    <i data-lucide="clipboard-check" class="w-3.5 h-3.5 text-indigo-500"></i> Ringkasan
                                    Pesanan
                                </p>
                                <div id="finalSummary" class="space-y-1.5 text-xs"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 justify-between mb-3">
                        <button class="btn-back" onclick="goStep(4)"><i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Kembali</button>
                        <button type="button" onclick="submitOrder()"
                            class="flex items-center gap-2 py-3 px-6 bg-green-500 hover:bg-green-600 active:scale-[.98] text-white font-bold rounded-2xl transition-all shadow-lg shadow-green-500/25 text-sm">
                            <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                            </svg>
                            Kirim via WhatsApp
                        </button>
                    </div>
                    <p class="text-center text-xs text-gray-400">Detail pesanan akan terisi otomatis di WhatsApp</p>
                </div>

            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="lg:col-span-5 space-y-4 lg:sticky lg:top-24">

                {{-- Live Preview --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-900 text-sm flex items-center gap-2">
                            <i data-lucide="smartphone" class="w-4 h-4 text-indigo-500"></i> Preview Live
                        </h3>
                        <span class="text-[10px] text-gray-400 bg-gray-100 px-2 py-1 rounded-lg">Update otomatis</span>
                    </div>
                    <div class="flex justify-center">
                        <div class="phone-wrap float-anim" id="phoneWrap">
                            <div class="preview-screen layout-a" id="pvScreen" style="background:#faf7ff">

                                {{-- Photo area --}}
                                <div class="p-img" id="pvImg">
                                    <div class="photo-mock" id="pvPhoto"
                                        style="background:linear-gradient(160deg,#ede4f7 0%,#ddd0f0 40%,#c9b8e8 100%)">
                                        <svg class="ornament-svg" viewBox="0 0 240 280"
                                            preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg"
                                            id="ornamentSvg">
                                            <g stroke="rgba(255,255,255,0.45)" fill="none" stroke-width="0.7">
                                                <path d="M12,12 Q12,28 28,12" />
                                                <path d="M12,12 Q28,12 12,28" />
                                                <circle cx="12" cy="12" r="1.5"
                                                    fill="rgba(255,255,255,0.3)" stroke="none" />
                                                <path d="M228,12 Q228,28 212,12" />
                                                <path d="M228,12 Q212,12 228,28" />
                                                <circle cx="228" cy="12" r="1.5"
                                                    fill="rgba(255,255,255,0.3)" stroke="none" />
                                                <path d="M12,268 Q12,252 28,268" />
                                                <path d="M12,268 Q28,268 12,252" />
                                                <circle cx="12" cy="268" r="1.5"
                                                    fill="rgba(255,255,255,0.3)" stroke="none" />
                                                <path d="M228,268 Q228,252 212,268" />
                                                <path d="M228,268 Q212,268 228,252" />
                                                <circle cx="228" cy="268" r="1.5"
                                                    fill="rgba(255,255,255,0.3)" stroke="none" />
                                            </g>
                                            <line x1="70" y1="8" x2="170" y2="8"
                                                stroke="rgba(255,255,255,0.2)" stroke-width="0.5" />
                                            <circle cx="120" cy="8" r="2" fill="rgba(255,255,255,0.15)"
                                                stroke="none" />
                                            <g transform="translate(72,50)" fill="rgba(255,255,255,0.16)">
                                                <circle cx="28" cy="10" r="10" />
                                                <path
                                                    d="M10,23 C10,23 16,20 28,20 C40,20 46,23 46,23 L44,82 C44,82 28,76 12,82 Z" />
                                                <circle cx="88" cy="10" r="10" />
                                                <path
                                                    d="M70,23 C70,23 76,20 88,20 C100,20 106,23 106,23 L104,82 C104,82 88,76 72,82 Z" />
                                            </g>
                                            <path
                                                d="M120,108 C120,102 114,94 106,94 C94,94 94,108 120,126 C146,108 146,94 134,94 C126,94 120,102 120,108Z"
                                                fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.18)"
                                                stroke-width="0.5" />
                                            <g transform="translate(120,170)" stroke="rgba(255,255,255,0.25)"
                                                fill="none" stroke-width="0.5">
                                                <path d="M-30,0 Q-15,-8 0,0 Q15,-8 30,0" />
                                                <path d="M-20,5 Q-10,0 0,5 Q10,0 20,5" />
                                            </g>
                                            <g fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.12)"
                                                stroke-width="0.3">
                                                <ellipse cx="40" cy="140" rx="12" ry="5"
                                                    transform="rotate(-30 40 140)" />
                                                <ellipse cx="200" cy="140" rx="12" ry="5"
                                                    transform="rotate(30 200 140)" />
                                                <ellipse cx="55" cy="155" rx="8" ry="3.5"
                                                    transform="rotate(-20 55 155)" />
                                                <ellipse cx="185" cy="155" rx="8" ry="3.5"
                                                    transform="rotate(20 185 155)" />
                                            </g>
                                            <line x1="70" y1="272" x2="170" y2="272"
                                                stroke="rgba(255,255,255,0.2)" stroke-width="0.5" />
                                            <circle cx="120" cy="272" r="2" fill="rgba(255,255,255,0.15)"
                                                stroke="none" />
                                        </svg>
                                        <div class="photo-mock-overlay"></div>
                                    </div>
                                </div>

                                {{-- Text area --}}
                                <div class="p-txt" id="pvTxt">
                                    <div class="p-hash" id="pvHash" style="color:#7C3AED">#RIZKYNISA</div>
                                    <div class="p-flourish" id="pvFlourishTop" style="color:#7C3AED">✦</div>
                                    <div class="p-names" id="pvNames"
                                        style="font-family:'Playfair Display',serif;color:#3b0764">Rizky<br><span
                                            class="p-amp">&</span><br>Nisa</div>
                                    <div class="p-flourish" id="pvFlourishBot" style="color:#7C3AED">✦</div>
                                    <div class="p-divider" id="pvDiv" style="background:#7C3AED"></div>
                                    <div class="p-date" id="pvDate" style="color:#7C3AED">Sabtu, 14 Juni 2025</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <p class="text-center text-[11px] text-gray-400 mt-3">Gambaran kasar — desain final lebih detail dengan
                        foto asli.</p>
                </div>

                {{-- Estimasi Harga Sidebar --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <h3 class="font-bold text-gray-900 text-sm mb-3 flex items-center gap-2">
                        <i data-lucide="receipt" class="w-4 h-4 text-indigo-500"></i> Estimasi Harga
                    </h3>
                    <div class="space-y-2 text-xs" id="priceList">
                        <div class="flex justify-between text-gray-600">
                            <span>Paket Custom (base)</span>
                            <span class="font-semibold">Rp 250.000</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 mt-3 pt-3 flex justify-between items-center">
                        <span class="text-sm font-bold text-gray-900">Total Estimasi</span>
                        <span class="text-lg font-bold text-indigo-700" id="totalPrice">Rp 250.000</span>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2">*Harga final dikonfirmasi setelah konsultasi</p>
                </div>

                {{-- Paket Custom Info --}}
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100 p-4">
                    <div class="flex items-center justify-between mb-2.5">
                        <span class="font-bold text-amber-800 text-sm flex items-center gap-2">
                            <i data-lucide="package" class="w-4 h-4 text-amber-600"></i> Paket Custom
                        </span>
                        <span class="font-bold text-amber-700 text-base">Rp 250.000</span>
                    </div>
                    <ul class="space-y-1.5 text-xs text-amber-800">
                        @foreach (['Custom desain & warna', 'Custom font pilihan', 'Custom tata letak', 'Custom URL', 'Unlimited revisi', 'Galeri foto & video', 'Countdown timer', 'Peta & navigasi', 'Multi-acara', 'QR Code tamu', 'RSVP & Guestbook', 'Musik latar sendiri', 'Priority support', 'Aktif selamanya*'] as $f)
                            <li class="flex items-center gap-1.5"><i data-lucide="check"
                                    class="w-3 h-3 text-amber-500 flex-shrink-0"></i>{{ $f }}</li>
                        @endforeach
                    </ul>
                    <p class="text-[10px] text-amber-500/80 mt-2.5">*Selama domain imora.id aktif</p>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        /* =========================================================
                   CONFIG
                ========================================================= */
        const WA_NUMBER = '628998375434';
        const BASE_PRICE = 250000;
        const DEFAULT_COLOR = '#7C3AED';

        /* =========================================================
           STATE — semua default sinkron dengan HTML awal
        ========================================================= */
        const S = {
            currentStep: 0,
            jenis: '', // '' = belum pilih
            font: '', // CSS font-family string
            fontName: '', // label nama font
            layout: 'a', // default = layout-a (sinkron HTML)
            color: '', // hex tanpa #, atau 'custom'
            colorName: '',
            colorTxt: '#fff',
            fitur: [],
            extraTotal: 0,
        };

        /* =========================================================
           HELPER — ambil elemen dengan null safety
        ========================================================= */
        function $(id) {
            return document.getElementById(id);
        }

        function val(id) {
            const el = $(id);
            return el ? el.value.trim() : '';
        }

        /* =========================================================
           HELPER — konversi hex (#RRGGBB) ke rgba string
           Menghindari hex 8-digit yang kurang kompatibel
        ========================================================= */
        function hexToRgba(hex, alpha) {
            hex = hex.replace('#', '');
            if (hex.length !== 6) return 'rgba(124,58,237,' + alpha + ')';
            const r = parseInt(hex.substring(0, 2), 16);
            const g = parseInt(hex.substring(2, 4), 16);
            const b = parseInt(hex.substring(4, 6), 16);
            return 'rgba(' + r + ',' + g + ',' + b + ',' + alpha + ')';
        }

        /* =========================================================
           STEPPER NAVIGASI
        ========================================================= */
        const TOTAL_STEPS = 6;

        function goStep(target) {
            // Validasi step saat maju
            if (target > S.currentStep && !validateStep(S.currentStep)) return;

            const cur = $('step-' + S.currentStep);
            if (!cur) return;

            cur.classList.add('leaving');
            setTimeout(function() {
                cur.classList.remove('active', 'leaving');
                S.currentStep = target;

                const next = $('step-' + S.currentStep);
                if (next) next.classList.add('active');

                updateStepper();
                updateFinalSummary();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

                // Re-init lucide icons setelah DOM berubah
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }, 220);
        }

        function updateStepper() {
            for (var i = 0; i < TOTAL_STEPS; i++) {
                var dot = $('dot-' + i);
                var lbl = $('dot-label-' + i);
                if (!dot || !lbl) continue;

                dot.classList.remove('active', 'done');

                if (i < S.currentStep) {
                    dot.classList.add('done');
                    lbl.innerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';
                } else if (i === S.currentStep) {
                    dot.classList.add('active');
                    lbl.textContent = i + 1;
                } else {
                    lbl.textContent = i + 1;
                }

                if (i < TOTAL_STEPS - 1) {
                    var line = $('line-' + i);
                    if (line) line.classList.toggle('done', i < S.currentStep);
                }
            }
        }

        /* =========================================================
           VALIDASI PER STEP
        ========================================================= */
        function validateStep(step) {
            clearErrors();

            if (step === 0) {
                var ok = true;
                if (!S.jenis) {
                    showErr('err-jenis');
                    shakeGroup('jenisGroup');
                    ok = false;
                }
                if (!val('nama1')) {
                    showErr('err-nama1');
                    shakeInput('nama1');
                    ok = false;
                }
                if (S.jenis === 'Pernikahan' && !val('nama2')) {
                    showErr('err-nama2');
                    shakeInput('nama2');
                    ok = false;
                }
                if (!val('tanggalAcara')) {
                    showErr('err-tgl');
                    shakeInput('tanggalAcara');
                    ok = false;
                }
                return ok;
            }

            if (step === 1) {
                if (!S.font) {
                    showErr('err-font');
                    shakeGroup('fontGroup');
                    return false;
                }
                return true;
            }

            if (step === 2) {
                if (!S.layout) {
                    showErr('err-layout');
                    shakeGroup('layoutGroup');
                    return false;
                }
                return true;
            }

            return true;
        }

        function clearErrors() {
            document.querySelectorAll('[id^="err-"]').forEach(function(e) {
                e.classList.add('hidden');
            });
            document.querySelectorAll('.form-input').forEach(function(e) {
                e.classList.remove('error');
            });
            document.querySelectorAll('.opt-btn,.fitur-btn').forEach(function(e) {
                e.classList.remove('error');
            });
        }

        function showErr(id) {
            var el = $(id);
            if (el) el.classList.remove('hidden');
        }

        function shakeInput(id) {
            var el = $(id);
            if (!el) return;
            el.classList.add('error');
            setTimeout(function() {
                el.classList.remove('error');
            }, 600);
        }

        function shakeGroup(id) {
            var el = $(id);
            if (!el) return;
            el.style.animation = 'shake .3s ease';
            setTimeout(function() {
                el.style.animation = '';
            }, 400);
        }

        /* =========================================================
           STEP 1 — JENIS ACARA
        ========================================================= */
        function pickJenis(btn) {
            document.querySelectorAll('#jenisGroup .opt-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            S.jenis = btn.dataset.value;

            var isPernikahan = (S.jenis === 'Pernikahan');
            var r2 = $('r2');
            var note = $('nama2note');
            if (r2) r2.style.display = isPernikahan ? '' : 'none';
            if (note) note.classList.toggle('hidden', isPernikahan);

            liveUpdate();
        }

        /* =========================================================
           STEP 2 — FONT
        ========================================================= */
        function pickFont(css, name, btn) {
            document.querySelectorAll('#fontGroup .opt-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            S.font = css;
            S.fontName = name;

            var badge = $('selFontBadge');
            if (badge) {
                badge.textContent = name;
                badge.classList.remove('hidden');
            }

            var pvNames = $('pvNames');
            if (pvNames) pvNames.style.fontFamily = css;
        }

        /* =========================================================
           STEP 3 — LAYOUT
        ========================================================= */
        function pickLayout(type, btn) {
            document.querySelectorAll('#layoutGroup .opt-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            S.layout = type;

            var screen = $('pvScreen');
            if (!screen) return;

            screen.classList.remove('layout-a', 'layout-b', 'layout-c');
            screen.classList.add('layout-' + type);

            // Selalu refresh warna setelah ganti layout
            if (type === 'c') {
                // Layout C: perbarui gradient foto saja, teks putih via CSS
                var photo = $('pvPhoto');
                if (photo) {
                    var hex = S.color || DEFAULT_COLOR;
                    photo.style.background = 'linear-gradient(160deg,' + hexToRgba(hex, 0.27) + ' 0%,' + hexToRgba(hex,
                        0.73) + ' 100%)';
                }
            } else {
                // Layout A/B: terapkan warna penuh ke semua elemen
                applyColorToPreview(S.color || DEFAULT_COLOR, S.colorTxt || '#fff');
            }
        }

        /* =========================================================
           STEP 4 — WARNA
        ========================================================= */
        function pickColor(hex, lbl, txt, btn) {
            document.querySelectorAll('.cswatch').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');

            S.color = hex;
            S.colorName = lbl;
            S.colorTxt = txt;

            var colorLabel = $('colorLabel');
            var colorLabelText = $('colorLabelText');
            var customWrap = $('customClrWrap');

            if (colorLabel) colorLabel.classList.remove('hidden');
            if (colorLabelText) colorLabelText.textContent = lbl;
            if (customWrap) customWrap.classList.add('hidden');

            applyColorToPreview(hex, txt);
        }

        function toggleCustomClr(btn) {
            document.querySelectorAll('.cswatch').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');

            S.color = 'custom';
            S.colorName = 'Custom';

            var colorLabel = $('colorLabel');
            var customWrap = $('customClrWrap');

            if (colorLabel) colorLabel.classList.add('hidden');
            if (customWrap) customWrap.classList.toggle('hidden');
        }

        /**
         * Terapkan warna ke semua elemen preview.
         * Hanya mengubah teks warna jika BUKAN layout C
         * (layout C memaksa putih via CSS !important).
         */
        function applyColorToPreview(hex, txt) {
            // Jika custom atau kosong, pakai default
            if (!hex || hex === 'custom') {
                hex = DEFAULT_COLOR;
            }

            var screen = $('pvScreen');
            var photo = $('pvPhoto');
            var names = $('pvNames');
            var date = $('pvDate');
            var hash = $('pvHash');
            var div = $('pvDiv');
            var flTop = $('pvFlourishTop');
            var flBot = $('pvFlourishBot');

            if (screen) {
                // Background layar: tint sangat ringan
                screen.style.background = hexToRgba(hex, 0.08);
            }

            if (photo) {
                // Gradient area foto
                photo.style.background = 'linear-gradient(160deg,' + hexToRgba(hex, 0.27) + ' 0%,' + hexToRgba(hex, 0.73) +
                    ' 100%)';
            }

            // Warna teks HANYA untuk layout A & B
            // Layout C memaksa putih via CSS !important, jadi skip
            if (S.layout !== 'c') {
                if (names) names.style.color = hex;
                if (date) date.style.color = hexToRgba(hex, 0.73);
                if (hash) hash.style.color = hexToRgba(hex, 0.53);
                if (div) div.style.background = hex;
                if (flTop) flTop.style.color = hexToRgba(hex, 0.4);
                if (flBot) flBot.style.color = hexToRgba(hex, 0.4);
            }
        }

        /* =========================================================
           STEP 5 — FITUR & HARGA
        ========================================================= */
        function toggleFitur(btn) {
            var fiturValue = btn.dataset.value;
            var extra = parseInt(btn.dataset.extra) || 0;
            var idx = S.fitur.indexOf(fiturValue);

            if (idx === -1) {
                S.fitur.push(fiturValue);
                btn.classList.add('active');
                S.extraTotal += extra;
            } else {
                S.fitur.splice(idx, 1);
                btn.classList.remove('active');
                S.extraTotal -= extra;
            }

            var badge = $('fiturBadge');
            if (badge) {
                badge.textContent = S.fitur.length;
                badge.classList.toggle('hidden', S.fitur.length === 0);
            }

            updatePrice();
        }

        function updatePrice() {
            var total = BASE_PRICE + S.extraTotal;

            function fmt(n) {
                return 'Rp ' + n.toLocaleString('id-ID');
            }

            var priceDisplay = $('priceDisplay');
            var totalPrice = $('totalPrice');
            if (priceDisplay) priceDisplay.textContent = fmt(total);
            if (totalPrice) totalPrice.textContent = fmt(total);

            // Daftar harga di sidebar
            var list = $('priceList');
            if (list) {
                var rows =
                    '<div class="flex justify-between text-gray-600"><span>Paket Custom (base)</span><span class="font-semibold">' +
                    fmt(BASE_PRICE) + '</span></div>';

                document.querySelectorAll('.fitur-btn.active').forEach(function(btn) {
                    var ex = parseInt(btn.dataset.extra) || 0;
                    if (ex > 0) {
                        rows += '<div class="flex justify-between text-gray-500"><span>' + btn.dataset.value +
                            '</span><span class="font-semibold text-green-600">+' + fmt(ex) + '</span></div>';
                    }
                });

                list.innerHTML = rows;
            }

            // Breakdown kecil
            var bd = $('priceBreakdown');
            if (bd) {
                bd.textContent = S.extraTotal > 0 ?
                    'Base ' + fmt(BASE_PRICE) + ' + Fitur ' + fmt(S.extraTotal) :
                    '';
            }
        }

        /* =========================================================
           LIVE PREVIEW — update teks saat ketik
        ========================================================= */
        function liveUpdate() {
            var n1 = val('nama1') || 'Rizky';
            var n2 = val('nama2') || 'Nisa';
            var namesEl = $('pvNames');
            var hashEl = $('pvHash');

            if (!namesEl) return;

            if (S.jenis === 'Pernikahan' || !S.jenis) {
                namesEl.innerHTML = n1 + '<br><span class="p-amp">&</span><br>' + n2;
                if (hashEl) {
                    hashEl.textContent = '#' + n1.replace(/\s/g, '') + n2.replace(/\s/g, '');
                    hashEl.style.display = '';
                }
            } else {
                namesEl.innerHTML = n1;
                if (hashEl) hashEl.style.display = 'none';
            }

            // Format tanggal
            var tglRaw = $('tanggalAcara');
            var dateEl = $('pvDate');
            if (tglRaw && tglRaw.value && dateEl) {
                var d = new Date(tglRaw.value + 'T00:00:00');
                var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];
                dateEl.textContent = days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d
                    .getFullYear();
            }
        }

        /* =========================================================
           RINGKASAN FINAL (step 6)
        ========================================================= */
        function updateFinalSummary() {
            if (S.currentStep !== 5) return;

            var n1 = val('nama1');
            var n2 = val('nama2');
            var items = [{
                    l: 'Acara',
                    v: S.jenis || '-'
                },
                {
                    l: 'Nama',
                    v: [n1, n2].filter(Boolean).join(' & ') || '-'
                },
                {
                    l: 'Tanggal',
                    v: val('tanggalAcara') || '-'
                },
                {
                    l: 'Lokasi',
                    v: val('lokasi') || '-'
                },
                {
                    l: 'Font',
                    v: S.fontName || '-'
                },
                {
                    l: 'Layout',
                    v: S.layout ? 'Layout ' + S.layout.toUpperCase() : '-'
                },
                {
                    l: 'Warna',
                    v: S.colorName || '-'
                },
                {
                    l: 'Fitur',
                    v: S.fitur.length ? S.fitur.join(', ') : 'Tidak ada'
                },
            ];

            var el = $('finalSummary');
            if (el) {
                el.innerHTML = items.map(function(i) {
                    return '<div class="flex gap-2"><span class="text-gray-400 w-16 flex-shrink-0">' + i.l +
                        '</span><span class="text-gray-700 font-semibold flex-1">' + i.v + '</span></div>';
                }).join('');
            }
        }

        /* =========================================================
           SUBMIT — kirim via WhatsApp
        ========================================================= */
        function submitOrder() {
            clearErrors();
            var ok = true;

            if (!val('namaPemesan')) {
                showErr('err-pemesan');
                shakeInput('namaPemesan');
                ok = false;
            }
            if (!val('noWa')) {
                showErr('err-wa');
                shakeInput('noWa');
                ok = false;
            }
            if (!ok) return;

            var n1 = val('nama1');
            var n2 = val('nama2');
            var nama = n2 ? n1 + ' & ' + n2 : n1;
            var warna = S.color === 'custom' ?
                (val('customClrInput') || 'Custom') :
                S.colorName;
            var fitur = S.fitur.length ? S.fitur.join(', ') : '-';
            var total = 'Rp ' + (BASE_PRICE + S.extraTotal).toLocaleString('id-ID');

            var msg =
                'Halo Imora! \uD83D\uDC4B Saya ingin memesan *Paket Custom* undangan digital.\n\n' +
                '\uD83D\uDCCB *Detail Acara:*\n' +
                '\u2022 Jenis: ' + S.jenis + '\n' +
                '\u2022 Nama: ' + nama + '\n' +
                '\u2022 Tanggal: ' + val('tanggalAcara') + '\n' +
                '\u2022 Lokasi: ' + (val('lokasi') || '-') + '\n\n' +
                '\uD83C\uDFA8 *Kustomisasi:*\n' +
                '\u2022 Font: ' + (S.fontName || '-') + '\n' +
                '\u2022 Layout: ' + (S.layout ? 'Layout ' + S.layout.toUpperCase() : '-') + '\n' +
                '\u2022 Warna: ' + (warna || '-') + '\n' +
                '\u2022 Fitur: ' + fitur + '\n\n' +
                '\uD83D\uDCB0 *Estimasi Harga: ' + total + '*\n\n' +
                '\uD83D\uDC64 *Pemesan:*\n' +
                '\u2022 Nama: ' + val('namaPemesan') + '\n' +
                '\u2022 WhatsApp: ' + val('noWa') + '\n\n' +
                '\uD83D\uDCDD *Catatan:*\n' +
                (val('catatan') || '-') + '\n\n' +
                'Mohon konfirmasinya, terima kasih! \uD83D\uDE4F';

            window.open('https://wa.me/' + WA_NUMBER + '?text=' + encodeURIComponent(msg), '_blank');
        }

        /* =========================================================
           INIT
        ========================================================= */
        document.addEventListener('DOMContentLoaded', function() {
            // Pasang listener input untuk live preview
            ['nama1', 'nama2', 'tanggalAcara'].forEach(function(id) {
                var el = $(id);
                if (el) el.addEventListener('input', liveUpdate);
            });

            // Inisialisasi harga
            updatePrice();

            // Inisialisasi lucide icons
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });
    </script>
@endpush
