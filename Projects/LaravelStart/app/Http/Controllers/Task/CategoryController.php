<?php

namespace App\Http\Controllers\Task;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function tasks($id)
    {
        $category = Category::query()->where('id', $id)->first();
        $tasks = Task::query()->where('category_id', $id)->get();
        if (count($tasks) != 0) {
            return view('tasks.category', compact(['tasks', 'category']));
        } else {
            return redirect(route('tasks.index'))->with('NotFound', 'Category is not found.');
        }
    }
}
