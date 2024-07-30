<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define difficulty levels
        $difficultyLevels = ['easy', 'medium', 'hard'];

        // Seed the tests table
        foreach ($difficultyLevels as $level) {
            Test::create([
                'name' => ucfirst($level) . ' Test', // Example: Easy Test, Medium Test, Hard Test
                'level' => $level,
                'test_file' => $level . '.json',
            ]);
        }
    }
}
