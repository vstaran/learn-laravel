<?php

namespace App\Service\History\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTask extends Model
{
    use HasFactory;

    protected $table = 'history_task';
    //protected $primaryKey = 'id';

}
