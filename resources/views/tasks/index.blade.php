<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        .add-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .edit-btn {
            background: #f59e0b;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .status {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="add-btn">
        + Add Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tasks as $task)

                    <tr>
                        <td>{{ $task->task_name }}</td>

                        <td>{{ $task->description }}</td>

                        <td class="status">
                            {{ $task->status }}
                        </td>

                        <td>
                            {{ $task->due_date ?? 'No due date' }}
                        </td>

                        <td>

                            <a href="{{ route('tasks.edit', $task) }}"
                               class="edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-btn"
                                        onclick="return confirm('Delete this task?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

    @else

        <p>No tasks yet. Click <strong>Add Task</strong> to create one.</p>

    @endif

</div>

</body>
</html>