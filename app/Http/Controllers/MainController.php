<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tasklist;

class MainController extends Controller
{
    public function main(){


        if(request('createList') != null){
            $createList = new Tasklist;
            $createList->title = request('newListTitle');
            $createList->userId = request('createList');
            $createList->save();
            return redirect('/home');
        }



        $listId = request('listId');

        if(request('done') != null){
            $action = Task::find(request('done'));
            $action->active = 0;
            $action->save();
        }

        if(request('undone') != null){
            $action = Task::find(request('undone'));
            $action->active = 1;
            $action->save();
        }

        if(request('delete') != null){
            $action = Task::find(request('delete'));
            $action->delete();
        }

        if(request('edit') != null){
            $action = Task::find(request('edit'));
            $action->task = request('newTitle');
            $action->save();
        }

        if(request('create') != null){
            $action = new Task;
            $action->task = request('newTask');
            $action->active = 1;
            $action->listId = request('listId');
            $action->save();
        }

        $data = Task::where('listId', $listId)->get();

        return view('main', [
            'listId' => $listId,
            'data' => $data,
        ]);
    }
}
