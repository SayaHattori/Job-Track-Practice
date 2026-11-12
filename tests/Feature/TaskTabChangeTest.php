<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class TaskTabChangeTest extends TestCase
{
    public function testReadyListOnly()
    {
        $Redy = Task::where('status', 5)->count(); //未着手
        $doing = Task::where('status', 1)->count(); //着手中
        $Done = Task::where('status', 1)->count(); //完了
        $notReady = Task::where('status', 1)->count(); //期限切れ

        $response = $this->get(route('tasklist', ['tabindex' => 1]));
        $response->assertStatus(200); //テストコード
        $response->assertViewHas('tasks');
        $tasks = $response->original['tasks'];
        $this->assertEquals(5, count($tasks));
    }

    public function testdoingListOnly()
    {
        $Redy = Task::where('status', 1)->count();
        $doing = Task::where('status', 5)->count();
        $Done = Task::where('status', 1)->count();
        $notReady = Task::where('status', 1)->count();

        $response = $this->get(route('tasklist', ['tabindex' => 2]));
        $response->assertStatus(200);
        $response->assertViewHas('tasks');
        $tasks = $response->original['tasks'];
        $this->assertEquals(5, count($tasks));
    }

    public function testDoneListOnly()
    {
        $Redy = Task::where('status', 1)->count();
        $doing = Task::where('status', 1)->count();
        $Done = Task::where('status', 5)->count();
        $notReady = Task::where('status', 1)->count();

        $response = $this->get(route('tasklist', ['tabindex' => 3]));
        $response->assertStatus(200);
        $response->assertViewHas('tasks');
        $tasks = $response->original['tasks'];
        $this->assertEquals(5, count($tasks));
    }

    public function testReadynotReadyListOnly()
    {
        $Redy = Task::where('status', 1)->count();
        $doing = Task::where('status', 1)->count();
        $Done = Task::where('status', 1)->count();
        $notReady = Task::where('status', 5)->count();

        $response = $this->get(route('tasklist', ['tabindex' => 4]));
        $response->assertStatus(200);
        $response->assertViewHas('tasks');
        $tasks = $response->original['tasks'];
        $this->assertEquals(5, count($tasks));
    }
}
