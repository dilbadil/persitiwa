<?php

use Illuminate\Database\Seeder;
use App\Status;
use App\Tag;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagIds = Tag::all()->lists('id')->toArray();
        $randomTagId = array_rand($tagIds);

        factory(Status::class, 50)->create()->each(function($status) use ($randomTagId) {
            $status->tags()->attach([$randomTagId]);
        });
    }
}
