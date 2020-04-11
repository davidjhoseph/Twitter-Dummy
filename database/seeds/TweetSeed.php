<?php

use Illuminate\Database\Seeder;
use App\Tweets;
class TweetSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tweets::class,30)->create();
    }
}
