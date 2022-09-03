<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;


class ForceDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forcedelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Completely delete post from database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $date = now()->subMonth(1)->format('Y-m-d');

        $expired = Post::onlyTrashed()->where('deleted_at', '<', $date)->forceDelete();

        $this->info("Expired post were deleted");
        return 0;
    }
}
