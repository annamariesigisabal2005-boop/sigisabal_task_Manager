<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .buttons {
            margin-top: 20px;
        }

        .save-btn {
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-btn {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Task</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label for="task_name">Task Name</label>
        <input type="text"
               id="task_name"
               name="task_name"
               value="{{ old('task_name') }}"
               required>

        <label for="description">Description</label>
        <textarea id="description"
                  name="description">{{ old('description') }}</textarea>

        <label for="status">Status</label>
        <select id="status" name="status">

            <option value="Pending"
                {{ old('status') == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status') == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label for="due_date">Due Date</label>
        <input type="date"
               id="due_date"
               name="due_date"
               value="{{ old('due_date') }}">

        <div class="buttons">

            <button type="submit" class="save-btn">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}" class="back-btn">
                Cancel
            </a>

        </div>

    </form>

</div>

</body>
</html>