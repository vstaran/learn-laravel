<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $table = 'tasks';
    protected $primaryKey = 'task_id';

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
