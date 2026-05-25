@extends('layouts.admin')

@section('title', 'Tambah Partner - Admin')
@section('page_title', 'Tambah Partner')
@section('page_subtitle', 'Tambahkan partner baru untuk mendukung platform AmikomEventHub.')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="px-10 py-8 border-b border-slate-100">

            <h1 class="text-3xl font-black text-slate-800">
                Tambah Partner Baru
            </h1>

            <p class="text-slate-500 mt-2 leading-relaxed">
                Lengkapi informasi partner beserta logo dan deskripsi perusahaan.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('admin.partners.store') }}"
            method="POST"
            class="p-10 space-y-8">

            @csrf

            <!-- Nama Partner -->
            <div>

                <label class="block text-sm font-black uppercase tracking-widest text-slate-600 mb-3">

                    Nama Partner

                </label>

                <input type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Google Indonesia"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium">

                @error('name')

                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>

                @enderror

            </div>

            <!-- Deskripsi -->
            <div>

                <label class="block text-sm font-black uppercase tracking-widest text-slate-600 mb-3">

                    Deskripsi

                </label>

                <textarea
                    name="description"
                    rows="5"
                    placeholder="Tulis deskripsi singkat mengenai partner..."
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium resize-none">{{ old('description') }}</textarea>

                @error('description')

                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>

                @enderror

            </div>

            <!-- Logo URL -->
            <div>

                <label class="block text-sm font-black uppercase tracking-widest text-slate-600 mb-3">

                    Logo URL

                </label>

                <input type="text"
                    name="logo_url"
                    value="{{ old('logo_url') }}"
                    placeholder="https://example.com/logo.png"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium">

                @error('logo_url')

                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>

                @enderror

            </div>

            <!-- Button -->
            <div class="pt-8 border-t border-slate-100 flex items-center justify-end gap-4">

                <a href="{{ route('admin.partners.index') }}"
                    class="px-6 py-4 rounded-2xl text-slate-500 font-bold hover:bg-slate-100 transition">

                    Batal

                </a>

                <button type="submit"
                    class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition shadow-xl shadow-indigo-100 active:scale-95">

                    Simpan Partner

                </button>

            </div>

        </form>

    </div>

</div>

@endsection