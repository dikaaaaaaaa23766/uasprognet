<?php
namespace App\Http\Controllers;
use App\Models\GeneralArticle;
use Inertia\Inertia;

class GeneralArticleController extends Controller
{
    public function show(GeneralArticle $article)
    {
        return Inertia::render('Public/GeneralArticleShow', [
            'article' => $article
        ]);
    }
}
