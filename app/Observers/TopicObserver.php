<?php

namespace App\Observers;

use App\Jobs\TranslateSlug;
use App\Library\Translate;
use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        //xss 过滤
        $topic->body=clean(htmlspecialchars_decode($topic->body),'user_topic_body');

        $topic->excerpt = make_excerpt($topic->body);


    }

    public function saved(Topic $topic)
    {
        if(!$topic->slug){
            //推送任务到队列
            dispatch(new TranslateSlug($topic));
        }
    }
}