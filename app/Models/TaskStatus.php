<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_status_id';

    public function tasks() {
        return $this->hasMany(Task::class, 'task_status_id');
    }
}
