<?php

namespace App\Jobs;

use App\Models\PageView;
use App\Models\PageViewLog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IncrementViewCounter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private ?User $user;
    private string $pageUrl;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $pageUrl)
    {
        $this->user = $user;
        $this->pageUrl = $pageUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /** @var PageView $pageView */
        $pageView = PageView::query()->firstOrCreate([
            'url' => $this->pageUrl
        ]);

        $pageView->update([
           'views_count' => ++$pageView->views_count,
        ]);


        PageViewLog::query()->create([
            'url' => $this->pageUrl,
            'user_id' => $this->user?->id,
        ]);
    }
}
