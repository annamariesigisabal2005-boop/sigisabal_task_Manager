@extends('layouts.app')

@section('content')

<div class="page">

    <h1>Add Task</h1>

    @if ($errors->any())

        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('tasks.store') }}"
          method="POST">

        @csrf

        <div class="form-group">

            <label>Task Name</label>

            <input type="text"
                   name="task_name"
                   value="{{ old('task_name') }}"
                   placeholder="Enter task name"
                   required>

        </div>

        <div class="form-group">

            <label>Description</label>

            <textarea name="description"
                      placeholder="Enter task description">{{ old('description') }}</textarea>

        </div>

        <div class="form-group">

            <label>Status</label>

            <select name="status">

                <option value="Pending">
                    Pending
                </option>

                <option value="Completed">
                    Completed
                </option>

            </select>

        </div>

        <div class="form-group">

            <label>Due Date</label>

            <input type="date"
                   name="due_date"
                   value="{{ old('due_date') }}">

        </div>

        <div class="form-buttons">

            <button type="submit">
                Save Task
            </button>

            <a class="cancel"
               href="{{ route('tasks.index') }}">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection

