<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Information;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $articles = collect();
        $latestArticles = collect();

        // Identifikasi login

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                // Jika admin, ambil semua artikel
                $articles = Article::where('status', true)->get();
                $latestArticles = Article::where('status', true)->latest()->limit(10)->get();
            } elseif ($user->role == 'author') {
                // Jika author, ambil artikel yang dia tulis saja
                $articles = Article::where('user_id', $user->id)
                    ->where('status', true)
                    ->get();
                $latestArticles = Article::where('user_id', $user->id)
                    ->where('status', true)
                    ->latest()
                    ->limit(10)
                    ->get();
            }
        }

        return view('admin.dashboard', [
            'articles'          => $articles,
            'categories'        => Category::all(),
            'users'             => User::all(),
            'user'              => $user,
            'information'       => Information::all(),
            'latest_articles'   => $latestArticles,
        ]);
    }
}
