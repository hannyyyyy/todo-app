<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    const PRIORITIES = [      //const sebuah nilai yang tidak bisa diubah
        'low',
        'medium',
        'high'
    ];

    public function getPriorityClassAttribute() {  //untuk mendapatkan sebuah prioritas yang nantinya setiap prioritas akan  diberikan warna sesuai warna 
        return match($this->attributes['priority']) {
            'low' => 'success',      //warna hijau
            'medium' => 'warning',   //warna kuning
            'high' => 'danger',      //warna merah 
            default => 'secondary'   // jika kita tidak memilih salah satu maka yang muncul warna abu / warna bawaan
        };
    }

    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}