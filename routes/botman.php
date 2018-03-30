<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;

$botman = resolve('botman');

$botman->hears('.*(Hi|Hello).*', function ($bot) {
    $bot->reply('Welcome');
    $bot->ask('Whats your name?', function($answer, $bot) {
        $bot->say('What can i do for you '.$answer->getText().'?');
    });
});

$botman->hears('welcome', function ($bot , $name) {
    $bot->reply('Hello! '.$name);
});

$botman->hears('Hi Im {name}', function ($bot , $name) {

	$bot->userStorage()->save([
    	'name' => $name
	]);
    $bot->reply('Hello! '.$name);

});

$botman->hears('whats my name', function ($bot) {
    $bot->reply('You are '.$name);
});

$botman->hears('set schedule', function($bot) {
    $bot->reply('Right away');
    $bot->ask('Date?', function($answer, $bot) {
        $bot->say('Schedule	has been created at '.$answer->getText());
    });
});


$botman->hears('Start a conversation', BotManController::class.'@startConversation');

$botman->receivesImages(function($bot, $images) {

    foreach ($images as $image) {

        $url = $image->getUrl(); // The direct url
        $title = $image->getTitle(); // The title, if available
        $payload = $image->getPayload(); // The original payload

         $bot->reply($url);

    }
});

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand:.....');
});

