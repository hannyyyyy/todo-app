<?php
// Seeders: mengisi database dengan data awal secara otomatis
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TaskListSeeder::class); //digunakan di DatabaseSeeder.php untuk menjalankan seeder TaskListSeeder. Seeder adalah fitur Laravel yang digunakan untuk mengisi database dengan data awal secara otomatis.

        $this->call(TaskSeeder::class); //digunakan dalam DatabaseSeeder.php untuk menjalankan TaskSeeder, yang bertugas mengisi tabel tasks dengan data awal.
    }
}