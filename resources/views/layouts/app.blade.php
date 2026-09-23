<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f3f4;
            color: #202124;
        }

        /* Top bar */
        nav {
            height: 64px;
            background: white;
            border-bottom: 1px solid #dadce0;
            display: flex;
            align-items: center;
            padding: 0 25px;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #0891b2;
            margin-right: 40px;
        }

        nav a {
            color: #5f6368;
            text-decoration: none;
            margin-right: 25px;
            font-size: 14px;
        }

        nav a:hover {
            color: #0891b2;
        }

        /* Main page */
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .page {
            background: white;
            border: 1px solid #dadce0;
            border-radius: 8px;
            padding: 35px;
            min-height: 500px;
        }

        h1 {
            font-size: 28px;
            font-weight: 400;
            color: #202124;
            margin-top: 0;
        }

        h2 {
            font-size: 20px;
            font-weight: 400;
            color: #202124;
        }

        h3 {
            color: #202124;
        }

        /* Buttons */
        .button,
        button {
            background: #06b6d4;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .button:hover,
        button:hover {
            background: #0891b2;
        }

        .delete {
            background: #dc3545;
        }

        .delete:hover {
            background: #b02a37;
        }

        .cancel {
            color: #5f6368;
            text-decoration: none;
            margin-left: 15px;
        }

        /* Dashboard cards */
        .stats {
            display: flex;
            gap: 15px;
            margin: 25px 0;
        }

        .stat {
            flex: 1;
            border: 1px solid #dadce0;
            border-radius: 8px;
            padding: 20px;
            background: white;
        }

        .stat-title {
            color: #5f6368;
            font-size: 14px;
        }

        .number {
            font-size: 28px;
            color: #0891b2;
            margin-top: 8px;
        }

        /* Task cards */
        .task {
            border: 1px solid #dadce0;
            border-radius: 8px;
            padding: 20px;
            margin-top: 15px;
        }

        .task h3 {
            margin-top: 0;
            font-size: 18px;
        }

        .task p {
            color: #5f6368;
        }

        /* Forms */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            color: #3c4043;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #dadce0;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border: 2px solid #06b6d4;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .form-buttons {
            margin-top: 25px;
        }

        /* Messages */
        .success {
            background: #e0f7fa;
            border: 1px solid #67e8f9;
            color: #0e7490;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Mobile */
        @media (max-width: 700px) {
            .stats {
                flex-direction: column;
            }

            nav {
                padding: 0 15px;
            }

            .logo {
                margin-right: 20px;
            }

            nav a {
                margin-right: 10px;
            }

            .page {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">
        Task Manager
    </div>

    <a href="{{ route('dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('tasks.index') }}">
        Tasks
    </a>

    <a href="{{ route('tasks.create') }}">
        Add Task
    </a>
</nav>

<div class="container">

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>

