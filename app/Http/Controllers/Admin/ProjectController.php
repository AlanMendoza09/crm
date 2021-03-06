<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);
        $users = User::all();


        return view('admin.projects', ['projects' => $projects, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
       $request->validate([
            'name' => 'required|min:6',
       ]);

       /*Project::create([$request->project]);*/


        $project = new Project;

        $project->created_by = Auth::id();
        $project->name = $request->name;
        $project->date_start = $request->date_start;
        $project->estimated_cost = $project->estimated_cost;
        $project->project_state = $project->project_state;
        $project->final_price = $project->final_price;
        if ($request->assigned != 0) {
            $project->assigned = $request->assigned;
        }

        $project->save();

        return redirect()->route('admin.projects')->with('success', 'Successfully Created User');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $assigned_to = User::findOrFail($project->assigned);

        return view('admin.project', ['project' => $project, 'assigned_to' => $assigned_to->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        $request->validate([
            'id' => 'required',
            'name' => 'required|min:6',
       ]);

       $project = Project::find($request->id);

        $project->created_by = Auth::id();
        $project->name = $request->name;
        $project->date_start = $request->date_start;
        $project->estimated_cost = $request->estimated_cost;
        $project->project_state = $request->project_state;
        $project->final_price = $request->final_price;
        if ($request->assigned != 0) {
            $project->assigned = $request->assigned;
        }

        $project->save();

        return redirect('admin/project/' . $project->id)->with('success', 'Successfully Updated User');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
