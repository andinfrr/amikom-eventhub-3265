@extends('layouts.admin')

@section('title', 'Data Partner - Admin')
@section('page_title', 'Data Partner')
@section('page_subtitle', 'Kelola seluruh partner yang mendukung platform AmikomEventHub.')

@section('content')

<!-- Header -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

    <!-- Search -->
    <form method="GET" class="flex items-center gap-3">

        <div class="relative">

            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari partner..."
                class="w-80 pl-12 pr-5 py-4 rounded-2xl border border-slate-200 bg-white shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-medium">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />

            </svg>

        </div>

        <button type="submit"
            class="px-6 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">

            Cari

        </button>

    </form>

    <!-- Add Button -->
    <a href="{{ route('admin.partners.create') }}"
        class="inline-flex items-center gap-2 px-6 py-4 bg-emerald-500 text-white rounded-2xl font-bold shadow-lg shadow-emerald-100 hover:bg-emerald-600 transition">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 4v16m8-8H4" />

        </svg>

        Tambah Partner

    </a>

</div>

<!-- Alert -->
@if(session('success'))

<div class="mb-6 px-6 py-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 font-semibold">

    {{ session('success') }}

</div>

@endif

<!-- Table -->
<div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <!-- Head -->
            <thead class="bg-slate-50 border-b border-slate-100">

                <tr class="text-left">

                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400 w-20">
                        No
                    </th>

                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400">
                        Partner
                    </th>

                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400">
                        Deskripsi
                    </th>

                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400 text-center w-56">
                        Aksi
                    </th>

                </tr>

            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-slate-100">

                @forelse($partners as $index => $partner)

                <tr class="hover:bg-slate-50/70 transition duration-300">

                    <!-- Number -->
                    <td class="px-8 py-6 font-bold text-slate-400">

                        {{ $index + 1 }}

                    </td>

                    <!-- Partner -->
                    <td class="px-8 py-6">

                        <div class="flex items-center gap-5">

                            <!-- Logo -->
                            <div class="w-20 h-20 rounded-2xl bg-slate-100 overflow-hidden flex items-center justify-center border border-slate-200 shrink-0">
<!-- baruuuuuuuuu -->
@if($partner->logo_url)



    <img src="{{ $partner->logo_url }}"
    class="w-full h-full object-contain p-3">

@else

<div class="w-full h-full flex items-center justify-center bg-indigo-100 text-indigo-600 text-2xl font-black">

    {{ strtoupper(substr($partner->name, 0, 1)) }}

</div>

@endif

                            </div>

                            <!-- Name -->
                            <div>

                                <h2 class="text-lg font-black text-slate-800">
                                    {{ $partner->name }}
                                </h2>

                                <p class="text-sm text-slate-400 mt-1">
                                    Official Partner
                                </p>

                            </div>

                        </div>

                    </td>

                    <!-- Description -->
                    <td class="px-8 py-6">

                        <p class="text-slate-500 leading-relaxed max-w-xl">

                           {{ $partner->description }}

                        </p>

                    </td>

                    <!-- Action -->
                    <td class="px-8 py-6">

                        <div class="flex items-center justify-center gap-3">

                            <!-- Edit -->
                            <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-yellow-100 text-yellow-700 font-bold hover:bg-yellow-500 hover:text-white transition">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                                </svg>

                                Edit

                            </a>

                            <!-- Delete -->
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus partner ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-rose-100 text-rose-700 font-bold hover:bg-rose-600 hover:text-white transition">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                    </svg>

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="px-8 py-20 text-center">

                        <div class="flex flex-col items-center">

                            <div class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center mb-6">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-12 h-12 text-slate-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 11H5m14-7H5m14 14H5" />

                                </svg>

                            </div>

                            <h2 class="text-2xl font-black text-slate-700 mb-3">

                                Belum Ada Partner

                            </h2>

                            <p class="text-slate-500 mb-8">

                                Tambahkan partner pertama untuk mulai membangun kolaborasi.

                            </p>

                            <a href="{{ route('admin.partners.create') }}"
                                class="px-6 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                                + Tambah Partner

                            </a>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection