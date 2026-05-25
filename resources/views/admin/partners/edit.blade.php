@extends('layouts.admin')

@section('title', 'Edit Partner - Admin')
@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Perbarui informasi partner AmikomEventHub.')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="px-10 py-8 border-b border-slate-100 bg-slate-50">

            <h1 class="text-3xl font-black text-slate-800 mb-2">
                Edit Partner
            </h1>

            <p class="text-slate-500">
                Ubah informasi partner dan logo perusahaan secara profesional.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('admin.partners.update', $partner->id) }}"
            method="POST"
            class="p-10 space-y-8">

            @csrf
            @method('PUT')

            <!-- Nama Partner -->
            <div>

                <label class="block text-sm font-black uppercase tracking-widest text-slate-500 mb-3">

                    Nama Partner

                </label>

                <input type="text"
                    name="name"
                    value="{{ old('name', $partner->name) }}"
                    placeholder="Masukkan nama partner..."
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium">

                @error('name')

                <p class="mt-2 text-sm text-red-500 font-medium">
                    {{ $message }}
                </p>

                @enderror

            </div>

            <!-- Logo URL -->
            <div>

                <label class="block text-sm font-black uppercase tracking-widest text-slate-500 mb-3">

                    Logo URL

                </label>

                <input type="text"
                    name="logo_url"
                    value="{{ old('logo_url', $partner->logo_url) }}"
                    placeholder="https://example.com/logo.png"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium">

                @error('logo_url')

                <p class="mt-2 text-sm text-red-500 font-medium">
                    {{ $message }}
                </p>

                @enderror

            </div>

<!-- Deskripsi -->
<div>

    <label class="block text-sm font-black uppercase tracking-widest text-slate-500 mb-3">

        Deskripsi

    </label>

    <textarea
        name="description"
        rows="5"
        placeholder="Tulis deskripsi partner..."
        class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium resize-none">{{ old('description', $partner->description) }}</textarea>

    @error('description')

    <p class="mt-2 text-sm text-red-500 font-medium">
        {{ $message }}
    </p>

    @enderror

</div>

            <!-- Preview -->
            <div>

                <label class="block text-sm font-black uppercase tracking-widest text-slate-500 mb-4">

                    Preview Partner

                </label>

                <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6">

                    <div class="flex items-center gap-6">

                        <!-- Logo -->
                        <div class="w-24 h-24 rounded-2xl bg-white border border-slate-200 overflow-hidden flex items-center justify-center shrink-0">

                            @if($partner->logo_url)

                            <img src="{{ $partner->logo_url }}"
                                alt="{{ $partner->name }}"
                                class="w-full h-full object-contain p-3">

                            @else

                            <div class="w-full h-full flex items-center justify-center bg-indigo-100 text-indigo-600 text-3xl font-black">

                                {{ strtoupper(substr($partner->name, 0, 1)) }}

                            </div>

                            @endif

                        </div>

                        

                        <!-- Info -->
                        <div>

                            <div class="flex items-center gap-3 mb-2">

                                <h2 class="text-2xl font-black text-slate-800">
                                    {{ $partner->name }}
                                </h2>

                                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-600 text-xs font-black uppercase tracking-wider">

                                    Official

                                </span>

                            </div>

                            <p class="text-slate-500 leading-relaxed max-w-lg">

                                Mendukung perkembangan event digital modern dan memberikan pengalaman terbaik untuk seluruh peserta event AmikomEventHub.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100">

                <a href="{{ route('admin.partners.index') }}"
                    class="px-6 py-4 rounded-2xl border border-slate-200 text-slate-600 font-bold hover:bg-slate-100 transition">

                    Batal

                </a>

                <button type="submit"
                    class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection