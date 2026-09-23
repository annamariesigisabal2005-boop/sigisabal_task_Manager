<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f3ff;
            margin: 0;
        }

        .navbar {
            background: #6d28d9;
            color: white;
            padding: 18px 40px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
        }

        button {
            margin-top: 20px;
            background: #6d28d9;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: #dc2626;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <strong>Personal Task Manager</strong>

    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('tasks.index') }}">Tasks</a>
</nav>

<div class="container">

    <h1>Edit Task</h1>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Task Name</label>

        <input type="text"
               name="task_name"
               value="{{ old('task_name', $task->task_name) }}"
               required>

        <label>Description</label>

        <textarea name="description">{{ old('description', $task->description) }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="Pending"
                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input type="date"
               name="due_date"
               value="{{ old('due_date', $task->due_date) }}">

        <button type="submit">
            Update Task
        </button>

    </form>

</div>

</body>
</html>