<?php

use Illuminate\Database\Seeder;
use App\Model\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Post::truncate();

        factory(Post::class, 15)->create();
    }
}
