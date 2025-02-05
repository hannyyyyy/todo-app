<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = ['name'];     //protected untuk mengontrol nama 
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
}