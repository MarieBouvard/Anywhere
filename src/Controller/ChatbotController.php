<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Symfony\Component\HttpFoundation\Request;

class ChatbotController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function chatBot(Request $request): Response
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        // Configuration for the BotMan WebDriver
        $config = [];

        // Create BotMan instance
        $botman = BotManFactory::create($config);

        // Give the bot some things to listen for.
        $botman->hears('(Hello|hi|hey)', function (BotMan $bot) {
            $bot->reply('Hello!');
        });

        // Set a fallback
        $botman->fallback(function (BotMan $bot) {
            $bot->reply('Sorry, I dit not understand');
        });

        // Start listening
        $botman->listen();

        return new Response();
    }

    // /**
    //  * @Route("/", name="app_home")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('chatbot/index.html.twig');
    // }
    
    /**
     * @Route("/chatframe", name="chatframe")
     */
    public function chatframeAction(Request $request)
    {
        return $this->render('chatbot/chat_frame.html.twig');
    }


}
