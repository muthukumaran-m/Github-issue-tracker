<?php

namespace App\Http\Controllers;

use App\Jobs\CreateIssue;
use App\Jobs\UpdateIssue;
use App\Models\GitIssue;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GitIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ["issues" => GitIssue::orderBy('updated_at','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $open = Config::get('constants.statuses.open');

        $issue = new GitIssue();
        $issue->title = $request->title;
        $issue->body = $request->description;
        $issue->status_id = Status::where('code', $open)->value('id');
        $issue->save();

        CreateIssue::dispatch($issue);

        return redirect(route('issues.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function show(GitIssue $issue)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(GitIssue $issue)
    {
        return view('edit', ["issue" => $issue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GitIssue $issue)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $issue->title = $request->title;
        $issue->body = $request->description;
        $issue->save();

        $data = [
            "title" => $request->title,
            "body" => $request->description,
            "id" => $issue->id
        ];

        UpdateIssue::dispatch($data);

        return redirect(route('issues.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(GitIssue $issue)
    {
        $closed = Config::get('constants.statuses.closed');

        $state = Status::where('code', $closed)->value('code');
        $data = [
            "id" => $issue->id,
            "state" => $state
        ];
        $issue->status_id=Status::where('code', $closed)->value('id');

        $issue->save();
        UpdateIssue::dispatch($data);

        return redirect(route('issues.index'));
    }
}
