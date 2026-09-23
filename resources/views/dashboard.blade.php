<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f3ff;
            color: #333;
        }

        .navbar {
            background: #6d28d9;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            padding: 0 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 25px 0;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .card h3 {
            margin: 0 0 10px;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            color: #6d28d9;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
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

        .button {
            display: inline-block;
            background: #6d28d9;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
        }

        @media (max-width: 800px) {
            .cards {
                grid-template-columns: 1fr 1fr;
            }
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

    <h1>Dashboard</h1>

    <div class="cards">

        <div class="card">
            <h3>Total Tasks</h3>
            <div class="number">{{ $totalTasks }}</div>
        </div>

        <div class="card">
            <h3>Pending</h3>
            <div class="number">{{ $pendingTasks }}</div>
        </div>

        <div class="card">
            <h3>Completed</h3>
            <div class="number">{{ $completedTasks }}</div>
        </div>

        <div class="card">
            <h3>Overdue</h3>
            <div class="number">{{ $overdueTasks }}</div>
        </div>

    </div>

    <div class="section">

        <h2>Recent Tasks</h2>

        <p>
            <a class="button" href="{{ route('tasks.create') }}">
                Add Task
            </a>

            <a class="button" href="{{ route('tasks.index') }}">
                View All Tasks
            </a>
        </p>

        <table>

            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Due Date</th>
            </tr>

            @forelse($recentTasks as $task)

                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_date ?? 'No date' }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="3">No tasks yet.</td>
                </tr>

            @endforelse

        </table>

    </div>

</div>

</body>
</html>