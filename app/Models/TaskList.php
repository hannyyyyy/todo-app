<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    // Menentukan atribut yang dapat diisi secara massal
    protected $fillable = ['name'];  // Nama daftar tugas (Task List) 
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
}