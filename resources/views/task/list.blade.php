@extends('layouts.app')

@section('title', 'Список Задач')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список Задач</h1>
</div>

@if($message = session('message'))
    <x-alert :type="$message['type']" :message="$message['message']"></x-alert>
@endif

@if($tasks->isEmpty())
    <p>Нет задач</p>
@else
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Группа</th>
                <th scope="col">Задача</th>
                <th scope="col">Статус</th>
                <th scope="col">Приоритет</th>
                <th scope="col">Создано</th>
                <th scope="col">Назначено</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Дата завершения</th>
                <th scope="col">Дейстивие</th>
            </tr>
        </thead>

        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->task_id }}</td>
                <td>{{ $task->group->name }}</td>
                <td>
                    {{ $task->name }}
                    <p class="text-muted">
                        {{ $task->excerpt() }}
                    </p>

                    @foreach($task->labels as $label)
                    <span class="badge rounded-pill increase-size" style="background: {{ $label->color }}">{{ $label->name }}</span>
                    @endforeach


                </td>
                <td><span class="badge bg-dark increase-size">{{ $task->status->name }}</span></td>
                <td><span class="badge bg-warning increase-size"><i class="bi bi-flag-fill"></i> {{ $task->priority }}</span></td>
                <td><i class="bi bi-person-circle"></i> {{ $task->creatorUser->name }}</td>
                <td><i class="bi bi-person-circle"></i> {{ $task->assignedUser->name }}</td>
                <td>@date($task->created_at, 'Y-m-d')</td>
                <td>
                    @empty($task->date_due)
                        -
                    @else
                        @date($task->date_due, 'Y-m-d')
                        {{-- $task->date_due->format('Y-m-d') --}}
                    @endif
                </td>
                <td>
                    <a href="{{ route('tasks.show', ['task' => $task]) }}" class="btn btn-primary btn-sm increase-size">
                        <i class="bi bi-eye-fill"></i> Просмотр</a>

                    <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-success btn-sm increase-size">
                        <i class="bi bi-pencil-fill"></i> Изменить</a>

                    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                    <button class="btn btn-danger btn-sm increase-size">
                        <i class="bi bi-trash-fill"></i> Удалить</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="float-end">
        {!! $tasks->links() !!}
    </div>
</div>
@endif

@endsection
