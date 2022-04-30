# TelegramBotAPI
TelegramBotAPI for PocketMine-MP plugins

# Import Class
```php
use io\enn3\telegrambot\TelegramBot;
```

# Example createBot & launch
```php
public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $bot = $this->getServer()->getPluginManager()->getPlugin("TelegramBot");
    $bot->createBot("BOT_TOKEN_GET_BOTFATHER");
    $bot->launch();
}
```

# Example getMessageText
```php
public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $bot = $this->getServer()->getPluginManager()->getPlugin("TelegramBot");
    $bot->createBot("BOT_TOKEN_GET_BOTFATHER");
    $bot->launch();
    if($bot->getMessageText() == "/start"){
        return true;
    }
}
```

# Example sendMessage & getChatId
```php
public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $bot = $this->getServer()->getPluginManager()->getPlugin("TelegramBot");
    $bot->createBot("BOT_TOKEN_GET_BOTFATHER");
    $bot->launch();
    if($bot->getMessageText() == "/start"){
        $bot->sendMessage($bot->getChatId(), "Hello There!");
        return true;
    }
}
```
