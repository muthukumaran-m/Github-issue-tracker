<?php

namespace App\Jobs;

use App\Models\GitIssue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateIssue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $issue;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($issue)
    {
        $this->issue = $issue;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Log::debug($this->issue);
        Http::withHeaders([
            'Accept' => 'application/vnd.github+json',
            'Authorization' => env('GITHUB_TOKEN')
        ])->patch(env('GITHUB_REPO') . '/issues/' . $this->issue['id'], $this->issue);
    }
}
