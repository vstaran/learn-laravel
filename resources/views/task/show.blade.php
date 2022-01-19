@extends('layouts.app')

@section('title', $task->name)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $task->name }}</h1>
</div>

    <p>Группа: {{ $task->group->name }}</p>
    <p>{{ $task->description }}</p>

    <p>Статус: <span class="badge bg-dark">{{ $task->status->name }}</span></p>
    <p>Приоритет: <span class="badge bg-warning"><i class="bi bi-flag-fill"></i> {{ $task->priority }}</span></p>
    <p>Создано: <i class="bi bi-person-circle"></i> {{ $task->creatorUser->name }}</p>
    <p>Назначено: <i class="bi bi-person-circle"></i> {{ $task->assignedUser->name }}</p>

    <p>Дата добавления: @date($task->created_at, 'Y-m-d')</p>
    <p>Дата обновления: @date($task->updated_at, 'Y-m-d H:i:s')</p>

    <p>Дата завершения: @empty($task->date_due)
            -
        @else
            @date($task->date_due, 'Y-m-d')
        @endif
    </p>

@endsection
