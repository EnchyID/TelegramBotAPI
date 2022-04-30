<?php

namespace io\enn3\telegrambot;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use io\enn3\telegrambot\task\CurlUpdateTask;

class TelegramBot extends PluginBase implements Listener {

    private $url;

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("TelegramBot api for TelegramBot.");
    }
    
    public function createBot($token){
        $this->url = "https://api.telegram.org/bot" . $token;
        $this->getMe();
    }
    
    public function getMe(){
        $curl = new Curl();
        $result = $curl->request($this->url . "/getMe", "GET", array());
        $data = json_decode($result, true);
        return $data;
    }
    
    public function getUpdates(): array{
        $curl = new Curl();
        $result = $curl->request($this->url . "/getUpdates", "GET", array());
        $data = json_decode($result, true);
        if($data == null){
            return array();
        }
        return $data;
    }
    
    public function getChatId(){
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["chat"]["id"];
    }
    
    public function getMessageText(){
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["text"];
    }
    
    public function getMessageId(){
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["message_id"];
    }
    
    public function sendMessage(string $chatId, string $text){
        $data = array(
            "chat_id" => $chatId,
            "text" => $text
        );
        $curl = new Curl();
        $result = $curl->request($this->url . "/sendMessage", "POST", $data);
        $data = json_decode($result, true);
        if($data) print_r($data);
        else echo $result;
    }
    
    public function launch(){   
        $this->getScheduler()->scheduleRepeatingTask(new CurlUpdateTask($this), 3 * 10);
    }
    
    public function close(){
        if(gettype($this->curl_obj) === "resource")
            curl_close($this->curl_obj);
    }
}
