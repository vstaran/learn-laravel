<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TaskGroup;
use App\Models\TaskLabel;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $tasks;

    public function __construct(Task $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     * method - GET|HEAD
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.list', ['tasks' => $this->tasks->getTasks()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     * method - GET|HEAD
     *
     * @param TaskGroup $taskGroups
     * @param TaskStatus $taskStatuses
     * @param User $users
     * @param TaskLabel $taskLabels
     * @return \Illuminate\Http\Response
     */
    public function create(TaskGroup $taskGroups, TaskStatus $taskStatuses, User $users, TaskLabel $taskLabels)
    {
        return view('task.form',
            [
                'tasks' => $this->tasks->all(), /** TODO - задач может быть много - нудно добавить autocomplete для поля parent_task_id */
                'taskGroups' => $taskGroups->all(),
                'taskStatuses' => $taskStatuses->all(),
                'users' =>  $users->all(),
                'taskLabels' => $taskLabels->all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     * method - POST
     *
     * @param  TaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $tasks = $this->tasks->create($request->all());

        // add label to task
        $tasks->labels()->sync($request->input('task_label_id'));

        return back()->with('message', [
            'type' => 'success',
            'message' => 'Задача добавлена'
        ]);
    }

    /**
     * Display the specified resource.
     * method - GET|HEAD
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     * method - GET|HEAD
     *
     * @param Task $task
     * @param TaskGroup $taskGroups
     * @param TaskStatus $taskStatuses
     * @param User $users
     * @param TaskLabel $taskLabels
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, TaskGroup $taskGroups, TaskStatus $taskStatuses, User $users, TaskLabel $taskLabels)
    {
        return view(
            'task.form',
            [
                'task' => $task,
                'tasks' => $this->tasks->all(), /** TODO - задач может быть много - нудно добавить autocomplete для поля parent_task_id */
                'taskGroups' => $taskGroups->all(),
                'taskStatuses' => $taskStatuses->all(),
                'users' => $users->all(),
                'taskLabels' => $taskLabels->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * method - PUT|PATCH
     *
     * @param  TaskRequest  $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $task->labels()->sync($request->input('task_label_id'));

        $task->touch(); // updated_at - now()

        return back()->with('message', [
            'type' => 'success',
            'message' => 'Задача обновлена'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * method - DELETE
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => 'Задача успешно удалена'
        ]);
    }
}
