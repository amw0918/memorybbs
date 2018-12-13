<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = \App\Models\User::all()->pluck('id')->toArray();

        $topicIds = \App\Models\Topic::all()->pluck('id')->toArray();
        $fater = app(\Faker\Generator::class);

        $replys = factory(Reply::class)
            ->times(1000)
            ->make()->each(
                function ($replay, $index) use ($userIds, $topicIds, $fater) {
                        $replay->user_id=$fater->randomElement($userIds);
                        $replay->topic_id=$fater->randomElement($topicIds);

                }
            );

        Reply::insert($replys->toArray());
    }

}

