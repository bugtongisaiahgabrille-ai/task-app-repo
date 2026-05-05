<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>
    <h1>Task List</h1>
    
    @foreach($tasks as $task)
        <div>
            <!-- Update Form -->
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('PATCH')
                <button type="submit">Update</button>
                {{ $task->title }}
            </form>
            
            <!-- Delete Form -->
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>