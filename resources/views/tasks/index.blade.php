<!DOCTYPE html>
<html>
<head>
    <title>Tasks - Personal Task Manager</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f3ff;
        }

        .navbar {
            background: #6d28d9;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
        }

        .navbar h2 {
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }

        .button {
            background: #6d28d9;
            color: white;
            padding: 9px 14px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .delete {
            background: #dc2626;
        }

        .edit {
            background: #2563eb;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            margin-top: 20px;
        }

        .actions {
            display: flex;
            gap: 5px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <h2>Personal Task Manager</h2>

    <div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('tasks.index') }}">Tasks</a>
    </div>
</nav>

<div class="container">

    <h1>My Tasks</h1>

    <a class="button" href="{{ route('tasks.create') }}">
        + Add Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>

        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>

        @forelse($tasks as $task)

        <tr>
            <td>{{ $task->task_name }}</td>

            <td>{{ $task->description ?? 'No description' }}</td>

            <td>{{ $task->status }}</td>

            <td>{{ $task->due_date ?? 'No date' }}</td>

            <td>
                <div class="actions">

                    <a class="button edit"
                       href="{{ route('tasks.edit', $task) }}">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="button delete"
                                type="submit"
                                onclick="return confirm('Delete this task?')">
                            Delete
                        </button>

                    </form>

                </div>
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="5">
                No tasks found.
            </td>
        </tr>

        @endforelse

    </table>

</div>

</body>
</html>