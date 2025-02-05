<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function store(Request $request) {    
        $request->validate([ 
            'name' => 'required|max:100'    //users harus mengisi nama tidak lebih dari 100 huruf
        ]);

        TaskList::create([
            'name' => $request->name
        ]);

        return redirect()->back();
    }

    public function destroy($id) {
        TaskList::findOrFail($id)->delete();

        return redirect()->back();
    }
}