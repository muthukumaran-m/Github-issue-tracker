<?php

namespace App\Listeners;

use App\Models\GitIssue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\GitHubWebhooks\Models\GitHubWebhookCall;

class IssueDeletedInGit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(GitHubWebhookCall $webhookCall)
    {
        $issue = GitIssue::find($webhookCall->payload('issue.number'));
        $issue->delete();
    }
}
