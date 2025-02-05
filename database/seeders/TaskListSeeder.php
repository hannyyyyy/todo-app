<?php
// Seeders: mengisi database dengan data awal secara otomatis

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void  //untuk mengisi database dengan data awal.
    { 
        $lists = [   //lists : kategori / judul
            [
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ]
        ];

        TaskList::insert($lists);  //untuk memasukkan banyak data ke dalam tabel database menggunakan Laravel Eloquent
    }
}