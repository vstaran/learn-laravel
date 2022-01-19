@extends('layouts.app')

@if(isset($task))
    @section('title', 'Сохранить Задачу')
@else
    @section('title', 'Добавить Задачу')
@endif

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if(isset($task))
        <h1 class="h2">Сохранить Задачу</h1>
    @else
        <h1 class="h2">Добавить Задачу</h1>
    @endif
</div>

@if($message = session('message'))
    <x-alert :type="$message['type']" :message="$message['message']"></x-alert>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ниже список проблем валидации полей.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($task))
<form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
    @csrf
    @method('PATCH')
@else
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    @method('POST')
@endif

    <div class="row g-3">

        <div class="col-md-6">
            <label for="task_group_id" class="form-label">Группа:</label>
            <select class="form-select {{ $errors->has('task_group_id')? 'is-invalid':''}}" name="task_group_id" id="task_group_id">
                <option value="">- не выбрано -</option>
                @if ($taskGroups->count())
                    @foreach($taskGroups as $group)
                    <option value="{{ $group->task_group_id }}" {{ ($group->task_group_id == old('task_group_id', isset($task)? $task->task_group_id:''))? 'selected="selected"':'' }}>{{ $group->name }}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('task_group_id'))
                <div class="invalid-feedback">{{ $errors->first('task_group_id') }}</div>
            @endif
        </div>

        <div class="col-md-6">
            <label for="parent_task_id" class="form-label">Главная Задача:</label>
            <select class="form-select {{ $errors->has('parent_task_id')? 'is-invalid':''}}" name="parent_task_id" id="parent_task_id">
                <option value="">- не выбрано -</option>
                @if ($tasks->count())
                    @foreach($tasks as $item)
                        <option value="{{ $item->task_id }}" {{ ($item->task_id == old('parent_task_id', isset($task)? $task->parent_task_id:''))? 'selected="selected"':'' }}>{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('parent_task_id'))
                <div class="invalid-feedback">{{ $errors->first('parent_task_id') }}</div>
            @endif
        </div>

        <div class="col-sm-12">
            <label for="name" class="form-label">Найменование Задачи:</label>
            <input type="text" class="form-control {{ $errors->has('name')? 'is-invalid':''}}" placeholder="" value="{{ old('name', isset($task)? $task->name:'') }}" name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>


        <div class="col-sm-8">
            <label for="description" class="form-label">Описание Задачи:</label>
            <textarea rows="5" type="text" class="form-control {{ $errors->has('description')? 'is-invalid':''}}" name="description" id="description">{{ old('description', isset($task)? $task->description:'') }}</textarea>
            @if ($errors->has('description'))
                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="col-sm-4">
            <label class="form-label">Метки Задачи:</label>
            <div class="overflow-auto px-2 {{ $errors->has('priority')? 'is-invalid':''}}">
                @foreach($taskLabels as $key => $label)
                <div class="form-check py-1">
                    <input name="task_label_id[]"
                           class="form-check-input"
                           type="checkbox"
                           value="{{ $label->task_label_id }}"
                           id="task_label_id_{{ $label->task_label_id }}"
                           {{ in_array($label->task_label_id, old('task_label_id', isset($task)? $task->labels->pluck('task_label_id')->toArray():[]))? 'checked="checked"':'' }}>
                    <label class="form-check-label" for="task_label_id_{{ $label->task_label_id }}">
                        <span class="badge rounded-pill fs-6" style="background: {{ $label->color }}">{{ $label->name }}</span>
                    </label>
                </div>
                @endforeach
            </div>
            @if ($errors->has('task_label_id'))
                <div class="invalid-feedback">{{ $errors->first('task_label_id') }}</div>
            @endif
        </div>





        <div class="col-md-4">
            <label for="priority" class="form-label">Приоритет:</label>
            <select class="form-select {{ $errors->has('priority')? 'is-invalid':''}}" id="priority" name="priority">
                <option value="">- не выбрано -</option>
                @foreach(range(1, 5) as $priority)
                <option value="{{ $priority }}" {{ ($priority == old('priority', isset($task)? $task->priority:''))? 'selected="selected"':'' }}>{{ $priority }}</option>
                @endforeach
            </select>
            @if ($errors->has('priority'))
                <div class="invalid-feedback">{{ $errors->first('priority') }}</div>
            @endif
        </div>

        <div class="col-md-4">
            <label for="task_status_id" class="form-label">Статус:</label>
            <select class="form-select {{ $errors->has('task_status_id')? 'is-invalid':''}}" id="task_status_id" name="task_status_id">
                <option value="">- не выбрано -</option>
                @if ($taskStatuses->count())
                    @foreach($taskStatuses as $status)
                        <option value="{{ $status->task_status_id }}" {{ ($status->task_status_id == old('task_status_id', isset($task)? $task->task_status_id:''))? 'selected="selected"':'' }}>{{ $status->name }}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('task_status_id'))
                <div class="invalid-feedback">{{ $errors->first('task_status_id') }}</div>
            @endif
        </div>

        <div class="col-md-4">
            <label for="date_due" class="form-label">Дата завершения:</label>
            <input type="text" class="form-control {{ $errors->has('date_due')? 'is-invalid':''}}" placeholder="ГГГГ-ММ-ДД" value="{{ old('date_due', isset($task)? $task->date_due:'') }}" name="date_due" id="date_due">
            @if ($errors->has('date_due'))
                <div class="invalid-feedback">{{ $errors->first('date_due') }}</div>
            @endif
        </div>


        <div class="col-md-6">
            <label for="creator_user_id" class="form-label">Создано пользователем:</label>
            <select class="form-select {{ $errors->has('creator_user_id')? 'is-invalid':''}}" id="creator_user_id" name="creator_user_id">
                <option value="">- не выбрано -</option>
                @if ($users->count())
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ ($user->id == old('creator_user_id', isset($task)? $task->creator_user_id:''))? 'selected="selected"':'' }}>{{ $user->name }}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('creator_user_id'))
                <div class="invalid-feedback">{{ $errors->first('creator_user_id') }}</div>
            @endif
        </div>


        <div class="col-md-6">
            <label for="assigned_user_id" class="form-label">Назначено пользователю:</label>
            <select class="form-select {{ $errors->has('assigned_user_id')? 'is-invalid':''}}" id="assigned_user_id" name="assigned_user_id">
                <option value="">- не выбрано -</option>
                @if ($users->count())
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ ($user->id == old('assigned_user_id', isset($task)? $task->assigned_user_id:''))? 'selected="selected"':'' }}>{{ $user->name }}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('assigned_user_id'))
                <div class="invalid-feedback">{{ $errors->first('assigned_user_id') }}</div>
            @endif
        </div>

    </div>

    <hr class="my-4">

    <div class="text-center">
        @if(isset($task))
            <button class="btn btn-success btn-lg" type="submit">Сохранить</button>
        @else
            <button class="btn btn-primary btn-lg" type="submit">Добавить</button>
        @endif
    </div>

</form>
@endsection
