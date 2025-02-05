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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();  //Membuat kolom id sebagai primary key (Auto Increment).
            $table->string('name'); //Kolom untuk menyimpan nama tugas.
            $table->string('description')->nullable(); //  
            $table->boolean('is_completed')->default(false);   // 
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
          // *enum('priority', ['low', 'medium', 'high'])*
          //→ Menambahkan kolom priority yang hanya bisa memiliki salah satu dari tiga nilai: 'low', 'medium', atau   'high'.
          //→ Kolom ini memastikan bahwa nilai yang disimpan adalah salah satu dari nilai yang disebutkan.
          // *default('medium')*
          //→ Menyeting nilai default untuk kolom priority menjadi 'medium', jika tidak ada nilai yang diberikan saat insert data.

            $table->timestamps(); // Menambahkan kolom created_at & updated_at secara otomatis.

            $table->foreignId('list_id') //Menambahkan foreign key list_id (foreign key list_id -> digunakan untuk menandai suatu tabel terhubung dengan tabel lain dalam konteks tabel parent dan child).
                  ->constrained('task_lists', 'id') //Merujuk ke kolom 'id' di tabel 'task_lists'.
                  ->onDelete('cascade'); //Menghapus task jika list terkait dihapus.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};