<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());

    //     $jokeTypeQuestion = ButtonTemplate::create('Please select the kind of joke you wanna hear:')
    //             ->addButtons([
    //                 ElementButton::create('Chuck Norris')->type('payload')->payload('chucknorris'),
    //                 ElementButton::create('Children')->type('payload')->payload('children'),
    //                 ElementButton::create('Politics')->type('payload')->payload('politics'),
    //             ]);
    
    // $this->bot
    //     ->receives('start joke conversation')
    //     ->assertTemplate($jokeTypeQuestion, true);
    }
     /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function setsched(BotMan $bot)
    {

        $bot->redirect()->to('/');
    } 
}
