<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLabel extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_label_id';


    public function tasks() {
        return $this->belongsToMany(
            Task::class,
            'task_label',
            'task_label_id',
            'task_id'
        );
    }
}
