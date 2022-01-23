<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskGroup;
use App\Models\TaskLabel;
use App\Models\TaskStatus;
use App\Models\User;
use App\Service\History\History;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    protected $tasks;

    public function __construct(Task $tasks)
    {
        $this->tasks = $tasks;
    }

    public function index()
    {
        return view('home.index');
    }


    /**
     * Test for HistoryServiceProvider
     *
     */
    public function test(Task $task, Faker $faker)
    {
        $fake = $faker->create();
        $count_tasks = $task->count();

        // Select random task
        $record = $task->find(rand(1, $count_tasks));

        // Mod Task fields
        $record->name = $fake->jobTitle();
        $record->description = $fake->text(500);

        // Save mod fields of task in history
        //History::save($record);
        \App\Service\History\Facade\History::save($record); // use Facade

        // Save task
        $record->save();

        dd($record);
    }


}
