<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. DATA USERS
        $users = factory(\App\Model\User::class)
            ->times(20)
            ->create()
            ->each(function ($user) {
                $profile = factory(\App\Model\Profile::class)->make();
                $user->profile()->save($profile);
            });

        // 2. DATA PROJECTS
        factory(\App\Model\Project::class)
            ->times(20)
            ->make()
            ->each(function ($project) use ($users) {

                // 3. DATA KLIEN
                // Untuk setiap project, bikin client baru
                $client = factory(\App\Model\Client::class)->create();
                $project->client()->associate($client);
                $project->save();

                // 4. TASKLISTS
                // Untuk setiap project, tambahkan beberapa tasklists
                $tasklists = factory(\App\Model\Tasklist::class)->times(3)->make();
                $project->tasklists()->saveMany($tasklists);

                // // 5. TASK
                // // Untuk setiap tasklists di atas, tambahkan beberapa task
                $tasks = factory(\App\Model\Task::class)->times(5)->make();
                $tasks->each( function($task) use ($users) {
                    $creator = $users->random();
                    $assignee = $users->random();
                    $task->creator()->associate($creator);
                    $task->assignee()->associate($assignee);
                });

                $tasklists->each(function ($tasklist) use ($tasks) {
                    $tasklist->tasks()->saveMany($tasks);
                });

                // // 6. COMMENTS
                // // Untuk setiap task di atas, tambahkan beberapa comment
                $comments = factory(\App\Model\Comment::class)->times(2)->make();
                $comments->each( function ($comment) use ($users) {
                    $comment->commentator()->associate($users->random());
                });

                $tasks->each( function ($task) use ($comments) {
                    $task->comments()->saveMany($comments);
                });

                // // 7. MEMBERS
                // // Pilih beberapa random user sebagai member project
                $members = $users->random(5);
                $project->members()->attach($members);
            });
    }
}
