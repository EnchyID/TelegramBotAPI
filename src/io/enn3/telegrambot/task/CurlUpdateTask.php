<?php

namespace io\enn3\telegrambot\task;

use pocketmine\scheduler\Task;
use io\enn3\telegrambot\TelegramBot;

class CurlUpdateTask extends Task {
	
	private $plugin;
	private $url;
	private $method;
	private $params;
    private $type;
	private $opts;
	
	public function __construct(TelegramBot $plugin, $url, $method, $type = "GET", $params = array(), $opts = array()){
	    $this->plugin = $plugin;
		$this->url = $url;
		$this->method = $method;
		$this->params = $params;
		$this->opts = $opts;
	}
	
	public function getLoader(): TelegramBot{
	    return $this->plugin;
	}
	
	public function onRun() : void {
	    $this->getLoader()->request($this->url . $this->method, $this->type, $this->params);
	}
}
