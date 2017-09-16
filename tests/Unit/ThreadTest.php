<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;
	
	protected $thread;

	public function setUp()
	{
		parent::setUp();
		$this->thread = factory('App\Thread')->create();
	}

	/** @test */
	function a_thread_has_replies()
	{
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
	}

	/** @test */
	function a_thread_has_a_creator()
	{
		$this->assertInstanceOf('App\User', $this->thread->creator);
	}

	/** @test */
	function a_thread_can_add_a_reply()
	{
		$this->thread->addReply([
			'body' 		=> 'foobar',
			'user_id' 	=> 1,
		]);

		$this->assertCount(1, $this->thread->replies);
	}

	/*
		run a single test function:
		$ phpunit --filter a_thread_has_a_creator 
	*/
}