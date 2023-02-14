<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class GenerateTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generatetweet:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       // Send Tweet to twitter API
       $r_theme = rand(0, 3);
       $description = "LessTax est un site qui permet de générer des lettres de motivation ainsi que de se préparer aux entretiens d'embauche grâce à l'IA";
       $theme = array(
           "Comment cela peut booster votre carrière ?",
           "Comment cela peut vous aider à trouver un job ?",
           "Comment cela peut vous aider à trouver un stage ?",
           "Comment cela peut vous aider à trouver un job d'été ?",
       );

       $req = "Génère un tweet avec comme thème " . $theme[$r_theme] . " et comme description " . $description ."| Text + hashtag";
       $response1 = Http::withHeaders([
           'Content-Type' => 'application/json',
           'Authorization' => "Bearer ".env('OPENAIKEY'),
       ])->retry(3,100)->post(
           "https://api.openai.com/v1/completions",
           [
               'prompt' => $req,
               'model' => "text-davinci-003",
               'temperature' => 0.2,
               'max_tokens' => 200,
               'top_p' => 1,
               'frequency_penalty' => 0,
               'presence_penalty' => 0,
           ]
       );

       $tweet = $response1->json()['choices'][0]['text'];
       
       $stack = HandlerStack::create();
       $auth = new Oauth1([
           'consumer_key' => env('TW_CONSUMER_TOKEN'),
           'consumer_secret' => env('TW_CONSUMER_TOKEN_SECRET'),
           'token'           => env('TW_ACCESS_TOKEN'),
           'token_secret'    => env('TW_ACCESS_TOKEN_SECRET')
       ]);

       $stack->push($auth);

       $client = new Client([
           'base_uri' => 'https://api.twitter.com/1.1/',
           'handler' => $stack,
           'auth' => 'oauth'
       ]);
       $client->post('statuses/update.json?status='.urlencode($tweet), [
       ]);

        return Command::SUCCESS;
    }
}
