@extends('layouts.app')

@section('content')

<div class="page">

    <h1>Dashboard</h1>

    <p>
        Welcome to your Personal Task Manager.
    </p>

    <div class="stats">

        <div class="stat">
            <div class="stat-title">Total Tasks</div>
            <div class="number">{{ $totalTasks }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Pending</div>
            <div class="number">{{ $pendingTasks }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Completed</div>
            <div class="number">{{ $completedTasks }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Overdue</div>
            <div class="number">{{ $overdueTasks }}</div>
        </div>

    </div>

    <h2>Recent Tasks</h2>

    @forelse ($recentTasks as $task)

        <div class="task">

            <h3>{{ $task->task_name }}</h3>

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

        </div>

    @empty

        <div class="task">
            <p>No tasks yet.</p>

            <a class="button"
               href="{{ route('tasks.create') }}">
                Add Task
            </a>
        </div>

    @endforelse

</div>

@endsection

