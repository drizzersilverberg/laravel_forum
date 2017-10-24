<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ActivityTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
    function it_records_activity_when_a_thread_is_created()
    {
    	$this->signIn();

    	$thread = create('App\Thread');

    	$this->assertDatabaseHas('activities', [
    		'user_id' => auth()->id(),
    		'type' => 'created_thread',
    		'subject_id' => $thread->id,
    		'subject_type' => 'App\Thread',
    	]);

        $activity = \App\Activity::first();

        $this->assertEquals($activity->subject->id, $thread->id);
    }

    /** @test */
    function it_records_activity_when_a_reply_is_created()
    {
        $this->signIn();
        
        $reply = create('App\Reply');

        $this->assertEquals(2, \App\Activity::count());
    }
}
