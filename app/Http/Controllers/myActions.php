<?php

namespace App\Http\Controllers;

use App\Models\todo_lists;
use App\Models\todo_tasks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class myActions extends Controller
{
    public function mylists()
    {
        $lists = [];
        if (\Auth::user()) {
            $lists = todo_lists::all()->where('user_id', \Auth::user()->id)->sortBy('is_done');
        }
        return view('layouts.todoActions.welkome', ['myparams' => $lists]);
    }

    public function showToDO(Request $request)
    {
        $resid = $request->route()->parameter('id');
        $showTodo = todo_tasks::all()->where('todo_list_id', $resid)->sortBy('position');
        $query = \DB::table('todo_lists')->select('is_done')->where('id', $resid)->get();
        foreach ($query as $done) {
            if ($done->is_done == 3) {
                return redirect('/pagenotfound');
            }
        }
        return view('layouts.todoActions.main', ['pageid' => $resid, 'params' => $showTodo]);
    }


    public function creatNewList(Request $request)
    {
        $userName = \Auth::user()->name;
        if ($request->has('submit') and !empty($request->input('newlists'))) {
            $lst = new todo_lists();
            $lst->user_id = \Auth::user()->id;
            $lst->title = $request->input('newlists');
            $lst->is_done = 1;
            $lst->save();
            return redirect()->back()->withInput(['Success' => " $userName - Your ToDo List created."]);
        } else {
            return redirect()->back()->withInput(['Error' => " $userName - You must write name ToDo List."]);
        }
    }

    public function saveTasks(Request $request)
    {
        if ($request->has('submit')) {
            $userName = \Auth::user()->name;
            $newtsk = new todo_tasks();
            $newtsk->user_id = \Auth::user()->id;
            $newtsk->todo_list_id = $request->input('myid');
            $newtsk->title = $request->input('newmytask');
            $newtsk->is_done = 1;
            $newtsk->position = 1;
            $newtsk->save();
        }
        return redirect()->back()->withInput(['Success' => " $userName - Your Task created."]);
    }

    public function isdoneTask(Request $request)
    {
        if ($request->has('submit')) {
            $userName = \Auth::user()->name;
            $isdone = todo_tasks:: where('id', $request->input('isdone'));
            if (!empty($request->input('updt'))) {
                $isdone = todo_tasks:: where('id', $request->input('tskid'));
                $isdone->update(['title' => $request->input('newmytask'), 'is_done' => 2, 'position' => 2]);
                return redirect()->back()->withInput(['Success' => " $userName - Your ToDo List Is Upadted"]);
            } else {
                $isdone->update(['is_done' => 3, 'position' => 3]);
                return redirect()->back()->withInput(['Success' => " $userName - Your ToDo List Is Done"]);
            }
        }
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $mytasks = todo_tasks::find($request->input('isdone'));
        return redirect()->back()->withInput(['uptask' => $mytasks->title, 'updatee' => 1, 'tskid' => $mytasks->id]);
    }

    public function delTask($id)
    {
        $userName = \Auth::user()->name;
        $tsk = todo_tasks::where('user_id',\Auth::user()->id)->where('todo_list_id', $id)->delete();
        $lst = todo_lists::where('user_id', \Auth::user()->id)->where('id', $id)->update(['is_done' => 3]);
        return back()->withInput(['Success' => " $userName - Your ToDo List Remove"]);
    }
}
