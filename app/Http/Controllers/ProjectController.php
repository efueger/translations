<?php

namespace App\Http\Controllers;

use App\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function compact;
use function redirect;
use function view;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('project.index', ['projects' => Auth::user()->projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:30',
        ]);

        Project::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Project $project)
    {

        $this->authorize('edit', $project);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:30',
        ]);


        $this->authorize('update', $project);
        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return back();
    }
}
