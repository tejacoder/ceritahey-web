<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // admin
        User::create([
            'name'  => 'Admin CeritaHey',
            'email' => 'admin@ceritahey.com',
            'phone' => '081234567890',
            'password' => bcrypt('admin123'),
            'role'  => 'admin',
        ]);

        // contoh user
        User::create([
            'name'  => 'User Biasa',
            'email' => 'user@ceritahey.com',
            'phone' => '081234567891',
            'password' => bcrypt('user123'),
            'role'  => 'user',
        ]);

        // products
        $products = [
            ['name' => '1 Buku Cerita',     'slug' => '1-buku',       'book_count' => 1,  'price' => 2000,   'is_featured' => false],
            ['name' => 'Paket 5 Buku',      'slug' => 'paket-5-buku',  'book_count' => 5,  'price' => 8900,   'is_featured' => false],
            ['name' => 'Paket 10 Buku',     'slug' => 'paket-10-buku', 'book_count' => 10, 'price' => 15900,  'is_featured' => true],
            ['name' => 'Paket Lengkap Seri 2', 'slug' => 'paket-lengkap-seri-2', 'book_count' => 20, 'price' => 29900, 'is_featured' => false],
        ];

        foreach ($products as $i => $p) {
            Product::create([
                'name'        => $p['name'],
                'slug'        => $p['slug'],
                'description' => 'Koleksi buku cerita digital anak full color.',
                'book_count'  => $p['book_count'],
                'price'       => $p['price'],
                'is_featured' => $p['is_featured'],
                'sort_order'  => $i + 1,
            ]);
        }
    }
}
