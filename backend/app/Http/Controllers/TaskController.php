<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'order_id' => 'required|integer|exists:orders,id', // Validasi order yang ada
        'task' => 'required|string',
    ]);

    $task = Task::create([
        'order_id' => $request->order_id,
        'task' => $request->task,
        'user_id' => $request->user()->id, // Simpan siapa yang mengambil tugas
    ]);

    return response()->json($task, 201);
}

}
