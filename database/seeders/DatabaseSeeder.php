<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Akun Admin
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Kategori
        $seminar = \App\Models\Category::create([
            'name' => 'Seminar',
            'slug' => 'seminar',
        ]);

        $entertainment = \App\Models\Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $competition = \App\Models\Category::create([
            'name' => 'Competition',
            'slug' => 'competition',
        ]);

        // 3. Events (6 data)

        // Seminar
        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain UI/UX dari dasar hingga mahir bersama praktisi industri.',
            'date' => '2026-06-01 10:00:00',
            'location' => 'Lab Multimedia',
            'price' => 75000,
            'stock' => 80,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'AI & Future Tech Talk',
            'description' => 'Membahas perkembangan AI dan teknologi masa depan.',
            'date' => '2026-06-05 13:00:00',
            'location' => 'Auditorium Kampus',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // Entertainment
        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Jazz Night Festival',
            'description' => 'Nikmati malam santai dengan musik jazz live.',
            'date' => '2026-06-10 19:00:00',
            'location' => 'Open Stage Amikom',
            'price' => 60000,
            'stock' => 120,
            'poster_path' => 'posters/event-3.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Movie Screening Night',
            'description' => 'Nonton bareng film pilihan di layar lebar.',
            'date' => '2026-06-12 18:30:00',
            'location' => 'Cinema Kampus',
            'price' => 30000,
            'stock' => 90,
            'poster_path' => 'posters/event-4.png',
        ]);

        // Competition
        \App\Models\Event::create([
            'category_id' => $competition->id,
            'title' => 'E-Sport U-Champ Tournament',
            'description' => 'Turnamen e-sport antar mahasiswa dengan hadiah menarik.',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Hall Utama',
            'price' => 25000,
            'stock' => 150,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $competition->id,
            'title' => 'Hackathon Innovation Day',
            'description' => 'Kompetisi coding 24 jam untuk menciptakan solusi inovatif.',
            'date' => '2026-06-20 08:00:00',
            'location' => 'Inkubator Bisnis',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}