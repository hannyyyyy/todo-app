<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    // Menentukan atribut yang dapat diisi secara massal
    protected $fillable = ['name'];  // Nama daftar tugas (Task List) 

    // Menentukan atribut yang tidak boleh diisi secara massal
    protected $guarded = [
        'id',           // ID daftar tugas (auto-increment)
        'created_at',   // Waktu pembuatan daftar tugas (timestamp)
        'updated_at'    // Waktu pembaruan terakhir daftar tugas (timestamp)
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
}