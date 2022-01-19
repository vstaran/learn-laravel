<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;
    const DESCRIPTION_LIMIT = 8;

    // protected $table = 'tasks';
    protected $primaryKey = 'task_id';

    protected $dates = ['date_due'];

    protected $fillable = [
        'name',
        'description',

        'task_group_id',
        'parent_task_id',
        'priority',
        'task_status_id',
        'creator_user_id',
        'assigned_user_id',
        'date_due'
    ];

    public function getTasks() {
            return $this->with(['labels', 'status', 'creatorUser', 'assignedUser'])
                ->whereNull('parent_task_id')
                ->orderBy('priority', 'DESC');
    }

    public function excerpt() {
        return Str::words($this->description, Task::DESCRIPTION_LIMIT);
    }

    public function status() {
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }

    public function labels() {
        return $this->belongsToMany(
            TaskLabel::class,
            'task_label',
            'task_id',
            'task_label_id'
        );
    }

    public function group() {
        return $this->belongsTo(TaskGroup::class, 'task_group_id');
    }

    public function comments() {
        return $this->hasMany(TaskComment::class, 'task_id');
    }

    public function creatorUser() {
        return $this->belongsTo(User::class, 'creator_user_id', 'id');
    }

    public function assignedUser() {
        return $this->belongsTo(User::class, 'assigned_user_id', 'id');
    }

    public function subTasks() {
        // Laravel Eloquent Self Join Parent Child
        return $this->hasMany(self::class, 'parent_task_id', 'task_id');
    }



    /*
    public function children(){
        return $this->hasMany( 'App\Models\Cafe', 'parent', 'id' );
    }

    public function parent(){
        return $this->hasOne( 'App\Models\Cafe', 'id', 'parent' );
    }
    */

}
