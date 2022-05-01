# TelegramBotAPI
TelegramBotAPI for PocketMine-MP plugins

# Import Class
```php
use io\enn3\telegrambot\TelegramBot;
```

# Example createBot & launch
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOU_BOT_TOKEN");
}
```

# Example getMessageText
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOU_BOT_TOKEN");
    $this->bot->getMessageText();
}
```

# Example sendMessage & getChatId
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOU_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Hello there!");
}
```

# Example sendMessage with Markup
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOU_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Hello there!", "markdown", {
        "inline_keyboard" => [
            [["text" => "Test", "callback_data" => "Test"]]
        ]
    });
}
```
