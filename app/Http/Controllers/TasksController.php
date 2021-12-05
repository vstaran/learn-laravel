<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     * method - GET|HEAD
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = route('tasks.index');

        return "[GET|HEAD] Tasks Index-List / Current URL = " . $url;
    }

    /**
     * Show the form for creating a new resource.
     * method - GET|HEAD
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('tasks.create');

        return "[GET|HEAD] Task Create-Form / Current URL = " . $url;
    }

    /**
     * Store a newly created resource in storage.
     * method - POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = route('tasks.store');

        return "[POST] Task Store / Current URL = " . $url;
    }

    /**
     * Display the specified resource.
     * method - GET|HEAD
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = route('tasks.show', [
            'task' => $id
        ]);

        return "[GET|HEAD] Task Show / Current URL = " . $url;
    }

    /**
     * Show the form for editing the specified resource.
     * method - GET|HEAD
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('tasks.edit', [
            'task' => $id
        ]);

        return "[GET|HEAD] Task Edit / Current URL = " . $url;
    }

    /**
     * Update the specified resource in storage.
     * method - PUT|PATCH
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = route('tasks.update', [
            'task' => $id
        ]);

        return "[PUT|PATCH] Task Update / Current URL = " . $url;
    }

    /**
     * Remove the specified resource from storage.
     * method - DELETE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = route('tasks.destroy', [
            'task' => $id
        ]);

        return "[DELETE] Task Destroy / Current URL = " . $url;
    }
}
