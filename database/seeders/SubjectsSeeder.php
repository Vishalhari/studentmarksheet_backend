<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Subjects;



class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $subject = [
            ['subjectname' => 'Mathematics','created_at' => \Carbon\Carbon::now()],
            ['subjectname' => 'Science','created_at' => \Carbon\Carbon::now()],
            ['subjectname' => 'Social Science','created_at' => \Carbon\Carbon::now()],
            ['subjectname' => 'Business Studies','created_at' => \Carbon\Carbon::now()],
            ['subjectname' => 'Ecnomics','created_at' => \Carbon\Carbon::now()],
            ['subjectname' => 'English','created_at' => \Carbon\Carbon::now()],
            ['subjectname' => 'Hindi','created_at' => \Carbon\Carbon::now()], 
       ];
        Subjects::insert($subject);
    }
}
