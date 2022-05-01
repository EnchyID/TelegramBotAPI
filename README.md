# TelegramBotAPI
TelegramBotAPI for PocketMine-MP plugins

Get your bot Token [@BotFather.](https://t.me/BotFather)

# Import Class
```php
use io\enn3\telegrambot\TelegramBot;
```

# TelegramBot
| variable | type |
|:------:|:------:|
| BOT_TOKEN | string |

```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
}
```

# sendMessage
| variable | type | call |
|:------:|:------:|:------:|
| chat_id | string/integer | [chatId](https://github.com/FrogasQ/TelegramBotAPI#getchatid) |
| text | string | [Message](https://github.com/FrogasQ/TelegramBotAPI#getmessagetext) |
| parse_mode | string | markdown/HTML |
| reply_markup | array | [Keyboard](https://github.com/FrogasQ/TelegramBotAPI#keyboard) |

```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->sendMessage($this->bot->getChatId(), "Hello there!");
}
```

# Keyboard
| variable | type | call |
|:------:|:------:|:------:|
| inline_keyboard | array | [InlineKeyboard](https://github.com/FrogasQ/TelegramBotAPI#inlinekeyboard) |
| keyboard | array | [KeyboardButton](https://github.com/FrogasQ/TelegramBotAPI#keyboardbutton) |

# InlineKeyboard
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

# KeyboardButton
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

# getMe
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->getMe();
}
```

# getMessageId
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new TelegramBot("YOUR_BOT_TOKEN");
    $this->bot->getMessageId();
}
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
