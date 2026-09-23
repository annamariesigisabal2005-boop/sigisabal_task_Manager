@extends('layouts.app')

@section('content')

<div class="page">

    <h1>Edit Task</h1>

    @if ($errors->any())

        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('tasks.update', $task) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Task Name</label>

            <input type="text"
                   name="task_name"
                   value="{{ $task->task_name }}"
                   required>

        </div>

        <div class="form-group">

            <label>Description</label>

            <textarea name="description">{{ $task->description }}</textarea>

        </div>

        <div class="form-group">

            <label>Status</label>

            <select name="status">

                <option value="Pending"
                    {{ $task->status == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ $task->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

        </div>

        <div class="form-group">

            <label>Due Date</label>

            <input type="date"
                   name="due_date"
                   value="{{ $task->due_date }}">

        </div>

        <div class="form-buttons">

            <button type="submit">
                Update Task
            </button>

            <a class="cancel"
               href="{{ route('tasks.index') }}">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection

