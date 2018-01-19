<?php

namespace App\Http\Controllers\Project;

use App\Events\ProjectCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\EditRequest;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Model\Client;
use App\Model\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * ProjectController constructor.
     */
    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::where('user_id', $request->user()->id)->paginate();

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        $clients = Client::pluck('nama', 'id');

        return view('project.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $project = $this->service->save($request->user(), $request->all());

        event(new ProjectCreatedEvent($request->user(), $project));

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $clients = Client::pluck('nama', 'id');

        return view('project.edit', compact('project', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->fill($request->except('_token', '_method'));

        $project->client()->associate($request->get('client_id'));

        $project->save();

        return redirect()->route('project.index');
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
