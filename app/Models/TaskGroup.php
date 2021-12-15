<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_group_id';

    public function tasks() {
        return $this->hasMany(Task::class, 'task_group_id', 'task_group_id');
    }
}
