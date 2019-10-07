<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAll($id)
    {
        //    return Task::all()->when('id_user',$id);
        return view('employee.employee', ['task' => Task::all()->when('id_user', $id)]);
    }
}
