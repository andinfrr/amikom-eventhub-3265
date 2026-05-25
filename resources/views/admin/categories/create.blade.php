@extends('layouts.admin')

@section('content')

<main class="flex-1 min-h-screen p-10 overflow-y-auto bg-slate-50">

    <!-- Header -->
    <div class="mb-10 flex items-center justify-between">

        <div class="flex items-center gap-5">

            <!-- Icon -->
            <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br
                from-indigo-500 to-indigo-600 flex items-center
                justify-center shadow-xl shadow-indigo-200">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 7l9 4 9-4M3 7l9-4 9 4M3 7v10l9 4 9-4V7" />

                </svg>

            </div>

            <!-- Text -->
            <div>

                <h1 class="text-4xl font-black text-slate-800 tracking-tight">
                    Tambah Category
                </h1>

                <p class="text-slate-500 mt-2 text-lg leading-relaxed">
                    Tambahkan kategori event baru agar platform AmikomEventHub
                    lebih rapi, modern, dan mudah digunakan pengguna.
                </p>

            </div>

        </div>

        <!-- Back -->
        <a href="{{ route('admin.categories.index') }}"
            class="px-6 py-4 rounded-2xl bg-white border border-slate-200
            text-slate-600 font-bold hover:bg-slate-100 transition shadow-sm">

            ← Kembali

        </a>

    </div>

    <!-- Card -->
    <div class="max-w-4xl">

        <div class="bg-white rounded-[2.5rem]
            border border-slate-100 shadow-sm overflow-hidden">

            <!-- Top -->
            <div class="px-10 py-8 bg-gradient-to-r
                from-indigo-50 via-white to-slate-50
                border-b border-slate-100">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 rounded-3xl bg-indigo-100
                        flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8 text-indigo-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 7h10M7 12h10M7 17h6" />

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-3xl font-black text-slate-800">
                            Form Category
                        </h2>

                        <p class="text-slate-500 mt-1">
                            Isi informasi kategori event secara lengkap.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Form -->
            <form action="{{ route('admin.categories.store') }}"
                method="POST"
                class="p-10 space-y-8">

                @csrf

                <!-- Nama -->
                <div>

                    <label class="block text-sm font-black
                        uppercase tracking-widest text-slate-600 mb-3">

                        Nama Category

                    </label>

                    <input type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Seminar Teknologi"
                        class="w-full px-6 py-5 rounded-2xl
                        bg-slate-50 border border-slate-200
                        focus:bg-white focus:ring-4
                        focus:ring-indigo-500/10
                        focus:border-indigo-500
                        outline-none transition
                        font-medium text-slate-700">

                    @error('name')

                    <p class="mt-2 text-sm text-red-500 font-medium">
                        {{ $message }}
                    </p>

                    @enderror

                </div>

                <!-- Preview -->
                <div class="rounded-[2rem] border border-slate-200
                    bg-slate-50 p-8">

                    <p class="text-sm font-black uppercase
                        tracking-widest text-slate-500 mb-5">

                        Preview Category

                    </p>

                    <div class="bg-white border border-slate-100
                        rounded-3xl p-7 shadow-sm">

                        <div class="flex items-start justify-between gap-6">

                            <div>

                                <div class="flex items-center gap-3 mb-3">

                                    <h3 class="text-2xl font-black text-slate-800">

                                        {{ old('name') ?: 'Nama Category' }}

                                    </h3>

                                    <span class="px-3 py-1 rounded-full
                                        bg-indigo-100 text-indigo-600
                                        text-xs font-black uppercase tracking-wider">

                                        Category

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Tips -->
                <div class="bg-amber-50 border border-amber-100
                    rounded-[2rem] p-6 flex items-start gap-5">

                    <div class="w-14 h-14 rounded-2xl
                        bg-amber-100 flex items-center justify-center
                        shrink-0">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-amber-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />

                        </svg>

                    </div>

                    <div>

                        <h4 class="font-black text-amber-800 mb-2">
                            Tips Pengisian
                        </h4>

                        <p class="text-amber-700 leading-relaxed text-sm">

                            Gunakan nama category yang jelas dan profesional
                            agar pengguna lebih mudah menemukan event sesuai
                            minat mereka.

                        </p>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-4
                    pt-6 border-t border-slate-100">

                    <a href="{{ route('admin.categories.index') }}"
                        class="px-6 py-4 rounded-2xl
                        border border-slate-200 text-slate-600
                        font-bold hover:bg-slate-100 transition">

                        Batal

                    </a>

                    <button type="submit"
                        class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700
                        text-white rounded-2xl font-bold
                        shadow-xl shadow-indigo-100
                        transition active:scale-95">

                        Simpan Category

                    </button>

                </div>

            </form>

        </div>

    </div>

</main>

@endsection