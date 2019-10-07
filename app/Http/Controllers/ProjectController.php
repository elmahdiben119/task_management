<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'idclient' => 'required',
        ]);
        
        /*$project = Project();
        $project->name =  $request->input('name');
        $project->description = $request->input('description');
        $project->start_date =  $request->input('start_date');
        $project->end_date =  $request->input('end_date');
        $project->id_client = $project->id_client;
        $project->save();*/
        $data = array(
            'name' => $request->input('name'), 
            'description' => $request->input('description'), 
            'start_date' => $request->input('start_date'), 
            'end_date' =>$request->input('end_date'),
            'id_client' => $request->input('idclient')
        );
        // dd($data);
        Project::create($data);
        $clients = new ClientController();
        $clients = $clients->showAll();
        return view('home',['pro' => Project::all(),"clients" => $clients])->with('success','Client added successfully');
    }

    public function update(Request $request,$id){
        $project = Project::findOrFail($id);
        if ($project) {
            $project->name =  $request->input('name');
            $project->description = $request->input('description');
            $project->start_date =  $request->input('start_date');
            $project->end_date =  $request->input('end_date');
            $project->id_client = ($request->input('idclient') == null) ? $project->id_client : $request->input('idclient');
            $project->save();
            // return view('home',['pro' => Project::all()])->with('success','Client updated successfully');
            return redirect()->route('/')->with('success','Client updated successfully');
        }        
    }
    public function destroy(Request $request,$id){
        $project = Project::findOrFail($id);
        $project->delete();
        $clients = new ClientController();
        $clients = $clients->showAll();
        return view('project',['project' => $project,'clients' => $clients])->with('success','Client deleted successfully');
    }

    public function editView(Request $request,$id){
        $project = Project::findOrFail($id);
        $clients = new ClientController();
        $clients = $clients->showAll();
        return view('project',['project' => $project,'clients' => $clients]);
    }
}
