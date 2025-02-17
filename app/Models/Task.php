<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    // Menentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'name',         // Nama tugas
        'description',  // Deskripsi tugas
        'is_completed', // Status apakah tugas sudah selesai atau belum
        'priority',     // Tingkat prioritas tugas (low, medium, high)
        'list_id'       // ID daftar tugas yang terkait
    ];

    // Menentukan atribut yang tidak boleh diisi secara massal
    protected $guarded = [
        'id',          // ID tugas (auto-increment)
        'created_at',  // Waktu pembuatan tugas (timestamp)
        'updated_at'   // Waktu pembaruan terakhir tugas (timestamp)
    ];

    // Konstanta untuk daftar prioritas yang tersedia
    const PRIORITIES = [      
        'low',      // Prioritas rendah
        'medium',   // Prioritas sedang
        'high'      // Prioritas tinggi
    ];

    /**
     * Mengembalikan kelas CSS berdasarkan tingkat prioritas tugas.
     * Ini berguna untuk menampilkan warna atau badge yang sesuai di tampilan frontend.
     *
     * @return string
     */
    public function getPriorityClassAttribute() {  
        return match($this->attributes['priority']) {
            'low' => 'success',      // Warna hijau untuk prioritas rendah
            'medium' => 'warning',   // Warna kuning untuk prioritas sedang
            'high' => 'danger',      // Warna merah untuk prioritas tinggi
            default => 'secondary'   // Warna abu-abu jika tidak ada prioritas yang cocok
        };
    }

    /**
     * Relasi dengan model TaskList.
     * Setiap tugas (Task) dimiliki oleh satu daftar tugas (TaskList).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}
