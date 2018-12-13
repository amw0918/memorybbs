<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        //
    }

    public function updating(Reply $reply)
    {
        //
    }

    public function saved(Reply $reply)
    {
        $reply->topic->increment('reply_count',1);
    }

    public function deleted(Reply $reply)
    {

        $reply->topic->reply_count >0 && $reply->topic->decrement('reply_count',1);
    }
}