<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Index show all tasks
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('index', compact('tasks'));
    }

    /**
     * Show only 1 searching by ID
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        $task = $this->findOrFailTask($id);

        return view('show', compact('task'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'nullable|max:65535'
        ]);

        $task = new Task();
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return redirect()
            ->route('task.show', ['id' => $task->id])
            ->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $task = $this->findOrFailTask($id);

        return view('edit', compact('task'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'nullable|max:65535'
        ]);

        $task = $this->findOrFailTask($id);
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return redirect()
            ->route('task.show', ['id' => $task->id])
            ->with('success', 'Task updated successfully!');
    }

    private function findOrFailTask($id)
    {
        return Task::findOrFail($id);
    }
}


