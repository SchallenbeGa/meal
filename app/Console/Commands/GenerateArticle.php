<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GenerateArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generatearticle:cron';

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
        $r_theme = rand(0, 12);
        $theme = array(
            "Qu’est-ce qu’un entrepreneur ?",
            "Qu’est qu’une franchise et comment fonctionne-t-elle ?",
            "Quelles sont les carrières les mieux rémunérées ?",
            "Les stages en valent-ils la peine ?",
            "Pourquoi est-ce important pour les lycéens d’avoir un job d'été ?",
            "Comment vivre comme un nomade numérique ?",
            "Comment arrêter la discrimination sur le lieu de travail ?",
            "Qu’est-ce qu’un bénévole hospitalier ?",
            "Le bénévolat nuit-il aux plus nécessiteux ?", "Que signifie « de 9 à 5 » ?",
            "Qu’est-ce qu’un bon équilibre entre vie professionnelle et vie privée ?",
            "Quand les mères devraient-elles reprendre le travail ?",
            "Comment s’habiller pour un entretien d’embauche ?",
            "Quelles sont les techniques pour rédiger un CV ?",
            "Comment créer une infographie ?",
            "Les avantages d'une bonne lettre de motivation",
        );
        $req = "Genere moi un court texte (3 paragraphe) avec comme thème " . $theme[$r_theme] . " sous le nom de para1, para2 et para3 avec un titre et un domaine en format json";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . env('OPENAIKEY'),
        ])->post(
            "https://api.openai.com/v1/completions",
            [
                'prompt' => $req,
                'model' => "text-davinci-003",
                'temperature' => 0.2,
                'max_tokens' => 700
            ]
        );
        $choices = $response->json()['choices'];

        $res = $choices[0]["text"];
        $res = json_decode($res, true);
        $article_exemple = Article::create([
            'title' => $res['titre'],
            'slug' => Str::slug($res['titre'], '-'),
            'author' => 'Intelligence Articifielle',
            'category' =>  $res['domaine'],
            'content' => json_encode(array($res['para1'], $res['para2'], $res['para3'])),
        ]);
        $article_exemple->save();
        return Command::SUCCESS;
    }
}
