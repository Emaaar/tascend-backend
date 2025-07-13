<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $task = Task::create($request->only(['title', 'description']));
        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->only(['title', 'description', 'is_completed']));
        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
