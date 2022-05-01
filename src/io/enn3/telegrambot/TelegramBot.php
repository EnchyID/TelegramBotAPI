<?php

namespace io\enn3\telegrambot;

use pocketmine\scheduler\TaskScheduler;
use io\enn3\telegrambot\task\CurlUpdateTask;

class TelegramBot {

    private $url;
    private $curl_obj;
    private $params;
    private $method;
    private $type;

    public function __construct(string $token){
        $this->url = "https://api.telegram.org/bot" . $token;
        if(!function_exists("curl_init")){
            exit();
        }
        $this->init();
        $this->launch();
    }
    
    public function init(){
        $this->curl_obj = curl_init();
    }
    
    public function request($url, $method = "GET", $params = array(), $opts = array()){
        $method = trim(strtoupper($method));
        $opts[CURLOPT_FOLLOWLOCATION] = true;
        $opts[CURLOPT_RETURNTRANSFER] = 1;
        if($method === "GET"){
            $url .= "?" . serialize($params);
            $params = http_build_query($params);
        }else if($method === "POST"){
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
        }
        $opts[CURLOPT_URL] = $url;
        curl_setopt_array($this->curl_obj, $opts);
        $content = curl_exec($this->curl_obj);
        return $content;
    }
    
    public function getMe(){
        $this->method = "/getMe";
        $this->type = "GET";
        $this->params = array();
        if(!isset($this->getUpdates()["result"])){
        	return "Error to getHttps";
        }
        $result = $this->request($this->url . "/getMe", "GET", array());
        if($data) print_r($data);
        else echo $result;
    }
    
    public function getUpdates(): array{
        $this->method = "/getUpdates";
        $this->type = "GET";
        $this->params = array();
        $result = $this->request($this->url . "/getUpdates", "GET", array());
        $data = json_decode($result, true);
        if($data) print_r($data);
        else echo $result;
        if($data == null){
        	return array();
        }
        return $data;
    }

    public function getUpdateId(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["update_id"];
    }

    public function getChatUsername(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["chat"]["username"];
    }
  
    public function getChatFirstName(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["chat"]["first_name"];
    }

    public function getChatLastName(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["chat"]["last_name"];
    }

    public function getChatType(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["chat"]["type"];
    }

    public function getChatId(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["chat"]["id"];
    }

    public function getMessageDate(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["date"];
    }
    
    public function getMessageText(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["text"];
    }
    
    public function getMessageId(){
    	if($this->getUpdates() == array()){
    	    return "Error to getHttps";
    	}
        return $this->getUpdates()["result"][count($this->getUpdates()["result"]) - 1]["message"]["message_id"];
    }
    
    public function sendMessage(string $chatId, string $text, ?string $parse_mode = null, ?array $markup = null){ 
        $data = array(
            "chat_id" => $chatId,
            "text" => $text,
            "parse_mode" => $parse_mode,
            "reply_markup" => json_encode($markup)
        );
        $this->method = "/sendMessage";
        $this->type = "POST";
        $this->params = $data;
        $result = $this->request($this->url . "/sendMessage", "POST", $data);
        $data = json_decode($result, true);
        if($data) print_r($data);
        else echo $result;
    }
    
    public function launch(){ 
        $sc = new TaskScheduler();
        $sc->scheduleRepeatingTask(new CurlUpdateTask($this, $this->url, $this->type, $this->method, $this->params), 3 * 10);
    }
    
    public function close(){
        if(gettype($this->curl_obj) === "resource")
            curl_close($this->curl_obj);
    }
}
