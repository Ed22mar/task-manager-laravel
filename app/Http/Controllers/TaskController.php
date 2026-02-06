<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $user = Auth::user();

        // Se não houver usuário autenticado, retorna todas as tasks como fallback
        if (! $user) {
            $tasks = Task::latest()->get();

            return view('tasks.index', compact('tasks'));
        }

        /** @var \App\Models\User $user */
        $tasks = $user->tasks()->latest()->get();

        return view('tasks.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validação dos dados
        $validate = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
        ]);

        //
        $task = auth()->user()->tasks()->create($validate);

        return redirect()->back()->with('success','Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
