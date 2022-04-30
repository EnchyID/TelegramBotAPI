<?php

namespace io\enn3\telegrambot\task;

use pocketmine\scheduler\Task;
use io\enn3\telegrambot\TelegramBot;

class CurlUpdateTask extends Task {
	
	private $plugin;
	
	public function __construct(TelegramBot $plugin){
		$this->plugin = $plugin;
	}
	
	public function getLoader() : TelegramBot {
		return $this->plugin;
	}
	
	public function onRun() : void {
	    $this->getLoader()->getUpdates()["result"];
	}
}
