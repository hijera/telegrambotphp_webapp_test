# telegrambotphp_webapp_test
 Testing webapps validation

## How to test
1. [https://core.telegram.org/bots](Create bot using @Botfather in Telegram)  and get Bot Token
2. Put Bot Token in api.php ( $bot_token variable)
3. Upload to the own hosting
4. Configure Menu Button for your bot in Botfather. Set e URL that will be opened by tapping the menu button. ( write /mybots to the Botfather, select your bot, choose "Bot Settings" -> "Menu Button" -> "Configure Menu Button" and follow the instructions). URL must open directory on hosting with index.htm and api.php.
5. Open Your bot, click menu button and Click "Send data from Telegram"
