<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Run extends Command
{
	protected $signature = 'run';
	protected $description = 'fresh migrates, seed users';

	public function handle()
	{
		$this->call('migrate:fresh');
		$this->call('db:seed');
	}
}
