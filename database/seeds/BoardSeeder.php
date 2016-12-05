<?php

use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Boards\Models\Board::class, 10)->create()->each(function($b) {
        	$b->topics()->saveMany(factory(App\Boards\Models\Topic::class, 10)->make());
        });

        foreach(App\Boards\Models\Board::get() as $board) {
            foreach($board->topics as $topic) {
                $topic->replies()->saveMany(factory(App\Boards\Models\Reply::class, 10)->make());
            }
        }
    }
}
