@extends('layouts.app')

@section('content')

<div class="page">

    <h1>My Tasks</h1>

    <a class="button"
       href="{{ route('tasks.create') }}">
        + Add Task
    </a>

    <br><br>

    @forelse ($tasks as $task)

        <div class="task">

            <h3>
                {{ $task->task_name }}
            </h3>

            <p>
                {{ $task->description ?? 'No description.' }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $task->status }}
            </p>

            <p>
                <strong>Due Date:</strong>
                {{ $task->due_date ?? 'No due date' }}
            </p>

            <a class="button"
               href="{{ route('tasks.edit', $task) }}">
                Edit
            </a>

            <form action="{{ route('tasks.destroy', $task) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="delete">
                    Delete
                </button>

            </form>

        </div>

    @empty

        <div class="task">
            <p>No tasks found.</p>
        </div>

    @endforelse

</div>

@endsection

