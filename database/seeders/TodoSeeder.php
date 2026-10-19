<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Todo::factory()->count(50)->create();
        Todo::create(["title"=>"PHP Web Application Development","description"=>"PHP Basic and what the concept of web logic","status"=>false]);
        Todo::create(["title"=>"Laravel Core to Advanced Master Class","description"=>"Advanced Level of PHP and Laravel Framework","status"=>false]);
        Todo::create(["title"=>"AI-POWERED Laravel Backend Masterclass","description"=>"Backend and Frontend Concept","status"=>false]);
        Todo::create(["title"=>"Git and GitHub","description"=>"How to use git and version control","status"=>false]);
    }
}
