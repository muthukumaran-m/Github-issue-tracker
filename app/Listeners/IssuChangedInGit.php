<?php

namespace App\Listeners;

use App\Models\GitIssue;
use App\Models\Status;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Spatie\GitHubWebhooks\Models\GitHubWebhookCall;

class IssuChangedInGit implements ShouldQueue
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
        Log::debug($webhookCall->payload('issue.title'));

        // $issue = new GitIssue();
        // $issue->id = $webhookCall->payload('issue.number');
        // $issue->title = $webhookCall->payload('issue.title');
        // $issue->body = $webhookCall->payload('issue.body');
        // $issue->status_id = Status::where('code', $webhookCall->payload('issue.state'))->value('id');
        // $issue->save();

        $flight = GitIssue::updateOrCreate(
            ['id' => $webhookCall->payload('issue.number')],
            [
                'id' => $webhookCall->payload('issue.number'),
                'title' => $webhookCall->payload('issue.title'),
                "body" => $webhookCall->payload('issue.body'),
                "status_id" => Status::where('code', $webhookCall->payload('issue.state'))->value('id')
            ]
        );
    }
}
