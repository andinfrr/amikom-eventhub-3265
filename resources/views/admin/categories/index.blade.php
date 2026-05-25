@extends('layouts.admin')

@section('content')

<main class="flex-1 p-10 overflow-y-auto bg-slate-50 min-h-screen">

    <!-- Header -->
    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 mb-10">

        <div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-100 text-indigo-600 text-xs font-black uppercase tracking-[0.2em] mb-4">

                Category Management

            </div>

            <h1 class="text-5xl font-black text-slate-800 tracking-tight leading-tight">

                Kategori Event

            </h1>

            <p class="text-slate-500 mt-3 text-lg leading-relaxed max-w-2xl">

                @foreach ($categories as $category)
    {{ $category->description }}
@endforeach

            </p>

        </div>

        <!-- Button -->
        <a href="{{ route('admin.categories.create') }}"
            class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:scale-105 text-white px-8 py-5 rounded-[1.5rem] font-black shadow-2xl shadow-indigo-200 transition duration-300">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4" />

            </svg>

            Tambah Category

        </a>

    </div>

    <!-- Search + Stats -->
    
    <!-- Search -->
<div class="mb-8">

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-5">

        <form method="GET">

            <div class="relative">

                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari kategori event..."
                    class="w-full pl-14 pr-36 py-5 rounded-2xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition font-semibold text-slate-700">

                <!-- Search Icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-slate-400 absolute left-5 top-1/2 -translate-y-1/2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />

                </svg>

                <!-- Button -->
                <button type="submit"
                    class="absolute right-2 top-2 bottom-2 px-7 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-black transition">

                    Cari

                </button>

            </div>

        </form>

    </div>

</div>

    <!-- Table -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

        <!-- Top -->
        <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">

            <div>

                <h2 class="text-2xl font-black text-slate-800">

                    Data Category

                </h2>

                <p class="text-slate-500 mt-1">

                    Seluruh kategori event yang tersedia di sistem.

                </p>

            </div>

            <div class="hidden md:flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-600 text-sm font-black">

                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>

                Active

            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-white border-b border-slate-100">

                    <tr class="text-left">

                        <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400 w-24">

                            ID

                        </th>

                        <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400">

                            Nama Category

                        </th>


                        <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-slate-400 text-center w-64">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

    @forelse($categories as $index => $category)

    <tr class="hover:bg-slate-50 transition">

        <!-- No -->
        <td class="px-8 py-6 text-slate-400 font-bold">
            {{ $index + 1 }}
        </td>

        <!-- Nama -->
        <td class="px-8 py-6">

            <div>

                <h2 class="text-lg font-black text-slate-800">
                    {{ $category->name }}
                </h2>

            </div>

        </td>

        <!-- Action -->
        <td class="px-8 py-6">

            <div class="flex items-center gap-3">

                <!-- Edit -->
                <a href="{{ route('admin.categories.edit', $category->id) }}"
                    class="px-5 py-3 rounded-2xl bg-amber-100 text-amber-700 font-bold hover:bg-amber-500 hover:text-white transition">

                    Edit

                </a>

                <!-- Delete -->
                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus category ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="px-5 py-3 rounded-2xl bg-rose-100 text-rose-700 font-bold hover:bg-rose-600 hover:text-white transition">

                        Hapus

                    </button>

                </form>

            </div>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="4"
            class="text-center py-16 text-slate-400 font-semibold">

            Belum ada category

        </td>

    </tr>

    @endforelse

</tbody>

            </table>

        </div>

    </div>

</main>

@endsection