<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class BlogController extends Controller
{

    public function index()
    {
        $article = "";
        $category = "";
        $articles = Article::get();
        return HTMLMin::blade(view('blog.home', compact('articles', 'article', 'category')));
    }
    public function sort_category($category)
    {
        $article = "";
        $articles = Article::where('category', urldecode($category))->get();
        return HTMLMin::blade(view('blog.home', compact('articles', 'article', 'category')));
    }
    public function show(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->first();
        $article = json_decode($article);

        $like_check = false;
        if (!$article) {
            return redirect('/blog');
        }
        $comments = Comment::where('article_id', $article->id)->get();
        if ($comments == null) {
            $comments = [];
        } else {

            foreach ($comments as $comment) {
                $comment->author = User::where('id', $comment->user_id)->first()->firstname;
            }
        }
        $likes = Like::where('article_id', $article->id)->get();
        if ($likes == null) {
            $likes = [];
        } else {
            if (Like::where('user_id', Auth::id())->where('article_id',$article->id)->exists()) {
                $like_check = true;
            }
        }
        return view('blog.home', compact('article', 'comments', 'likes', 'like_check'));
    }
    public function comment(Request $request, $id_article)
    {

        $comment = $request->validate([
            'content' => 'required|string|max:120',
        ]);

        Comment::Create(
            [
                'user_id' => Auth::id(),
                'article_id' => $id_article,
                'content' => $comment['content'],
            ]
        );

        return redirect()->back();
    }
    public function like($id_article)
    {

        Like::Create(
            [
                'user_id' => Auth::id(),
                'article_id' => $id_article,
            ]
        );

        return redirect()->back();
    }
    //debug only
    public function create()
    {
        $r_branch = rand(0, 230);
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
        $req = "Genere moi un court texte (3 paragraphe) avec comme thème " . $theme[$r_theme] . " sous le nom de content avec un titre et un domaine en format json";
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
            'content' => json_encode(array($res['content'], $res['para2'], $res['para3'])),
        ]);
        $article_exemple->save();

        return HTMLMin::blade(redirect('/blog'));
    }
}
