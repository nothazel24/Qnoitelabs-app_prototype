<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['user', 'category'])->where('status', true)->latest()->limit(5)->get();
        return view('home.main', compact('articles'));
    }

    // ARTICLE CONTROLLER
    public function articles(Request $request)
    {
        $query = Article::where('status', true)->latest();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // PAGINATION
        $articles = $query->paginate(5);

        $categories = Category::all();
        $information = Information::latest()->limit(5)->get();

        return view('home.article.main', compact('articles', 'categories', 'information'));
    }

    // DISPLAY ARTICLE
    public function articlesShow($slug)
    {
        $articles = Article::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $information = Information::latest()->limit(5)->get();

        return view('home.article.show', compact('articles', 'categories', 'information'));
    }

    public function articlesCategories($categoryId)
    {
        $articles = Article::where('category_id', $categoryId)
            ->where('status', true)
            ->latest()
            ->paginate(8);

        $categories = Category::all();
        $information = Information::latest()->limit(5)->get();

        return view('home.article.main', compact('articles', 'categories', 'information'));
    }
}
