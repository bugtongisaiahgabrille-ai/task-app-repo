<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task App</title>
    <style>
        .task-item { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
        .done { text-decoration: line-through; color: gray; }
    </style>
</head>
<body>
    <h1>Task Manager</h1>

    <!-- Create Task Form -->
    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="New Task" required>
        <button type="submit">Add Task</button>
    </form>

    <hr>

    <!-- Task List -->
    @foreach($tasks as $task)
        <div class="task-item">
            <!-- Toggle Status Form (PATCH) -->
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('PATCH')
                <button type="submit">
                    {{ $task->is_done ? '✅' : '❌' }}
                </button>
            </form>

            <!-- Task Title -->
            <span class="{{ $task->is_done ? 'done' : '' }}">
                {{ $task->title }}
            </span>

            <!-- Delete Form (DELETE) -->
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    @endforeach

</body>
</html>