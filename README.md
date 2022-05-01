# TelegramBotAPI
TelegramBotAPI for PocketMine-MP plugins
Get your bot api key [@BotFather.](https://t.me/BotFather)

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

# Example sendMessage InlineKeyboard
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOU_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Are you human?", "markdown", [
        "inline_keyboard" => [
            [["text" => "Yes", "callback_data" => "Yes"], ["text" => "No", "callback_data" => "No"]]
        ]
    ]);
}
```

# Example sendMessage KeyboardButton
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOU_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Select a button:", "markdown", [
        "keyboard" => [
            [["text" => "Button 1"]],
            [["text" => "Button 2"]]
        ],
        "resize_keyboard" => true,
        "one_time_keyboard" => true
    ]);
}
```
