<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function owner($id)
    {
        $tasks = Task::query()->where('user_id', $id)->get();
        $owner = User::query()->find($id);
        if ($owner) {
            return view('tasks.owner', compact(['owner', 'tasks']));
        } else {
            return redirect(route('tasks.index'))->with('NotFound', 'Owner is not found.');
        }
    }
}
