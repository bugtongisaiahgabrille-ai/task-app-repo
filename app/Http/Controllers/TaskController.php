<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        // It's good practice to validate the request first
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title
        ]);

        return redirect()->back();
    }

    /**
     * Toggle the status of the task (Done/Not Done).
     */
    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = !$task->is_done;
        $task->save();

        return redirect()->back();
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->back();
    }
}