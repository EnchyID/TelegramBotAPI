# TelegramBotAPI
TelegramBotAPI for PocketMine-MP plugins

Get your bot Token [@BotFather.](https://t.me/BotFather)

# Import Class
```php
use io\enn3\telegrambot\TelegramBot;
```

# TelegramBot
| string | TokenBot |
|:------:|:--------:|
# sendMessage
| string | [ChatId](https://github.com/FrogasQ/TelegramBotAPI#getchatid)
|:------:|:--------:|
| string | Messages |
|:------:|:--------:|

# CreateBot
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
}
```

# API
```php
sendMessage(string, string, string, array);
getMe();
getUpdates();
getChatId();
getMessageText();
getMessageId();
```

# getMessageText
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->getMessageText();
}
```

# getChatId
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->getChatId();
}
```

# sendMessage
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Hello there!");
}
```

# sendMessage InlineKeyboard
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Are you human?", "markdown", [
        "inline_keyboard" => [
            [["text" => "Yes", "callback_data" => "Yes"], ["text" => "No", "callback_data" => "No"]]
        ]
    ]);
}
```

# sendMessage KeyboardButton
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
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
