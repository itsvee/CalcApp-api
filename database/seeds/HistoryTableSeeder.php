<?php

use Illuminate\Database\Seeder;
use App\History;

class HistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // History::truncate();
        History::create([
            'a_value' => 2,
            'b_value' => 2,
            'operator' => 'plus',
        ]);
    }
}
