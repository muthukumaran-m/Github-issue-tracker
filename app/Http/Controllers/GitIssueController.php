<?php

namespace App\Http\Controllers;

use App\Events\IssueProcessed;
use App\Models\GitIssue;
use Illuminate\Http\Request;

class GitIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $issue = new GitIssue();

        $issue->staus_id = 1;
        $issue->title = $request->title;
        $issue->body = $request->body;

        IssueProcessed::dispatch($issue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function show(GitIssue $gitIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(GitIssue $gitIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GitIssue $gitIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GitIssue  $gitIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(GitIssue $gitIssue)
    {
        //
    }
}
