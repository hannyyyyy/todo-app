<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto Increment) / kunci utama (peningkatan otomatis)
            $table->string('name')->unique(); //Nama kategori tugas
            $table->timestamps();  // created_at & updated_at / dibuat dan diperbaharui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //Method down() digunakan dalam migration untuk menghapus tabel saat migration dibatalkan (rollback).

    {
        Schema::dropIfExists('task_lists'); //Menghapus tabel task_lists jika tabel tersebut ada di database.
    }
};