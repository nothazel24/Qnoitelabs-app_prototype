<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Information;
use App\Models\Category;
use App\Models\WebsiteCategory;
use App\Models\Products;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['user', 'category'])->where('status', true)->latest()->limit(5)->get();
        $feedback = Feedback::with('user')->latest()->limit(3)->get();
        $user = User::first();

        return view('home.main', compact('articles', 'feedback', 'user'));
    }

    // PROFILE CONTROLLER
    public function profile()
    {
        $user = User::first();
        return view('home.profile.main', compact('user'));
    }

    // CONTACT CONTROLLER
    public function contact()
    {
        $user = User::first();
        return view('home.contact.main', compact('user'));
    }

    // CART PAGE CONTROLLER
    public function whistlist()
    {
        $user = User::first();
        return view('home.whistlist.main', compact('user'));
    }

    // INVOICE PAGE CONTROLLER (*BUG)
    public function invoice($slug)
    {
        $product = Products::where('slug', $slug)->firstOrFail();
        $user = User::first();

        return view('home.invoice.main', compact('product', 'user'));
    }

    // ARTICLE CONTROLLER
    public function articles(Request $request)
    {
        $query = Article::where('status', true)->latest();

        // PAGINATION
        $articles = $query->paginate(5);

        $categories = Category::all();
        $information = Information::latest()->limit(5)->get();
        $user = User::first();

        return view('home.article.main', compact('articles', 'categories', 'information', 'user'));
    }

    // DISPLAY ARTICLE
    public function articlesShow($slug)
    {
        $articles = Article::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $information = Information::latest()->limit(5)->get();
        $user = User::first();

        return view('home.article.show', compact('articles', 'categories', 'information', 'user'));
    }

    public function articlesCategories($categoryId)
    {
        $articles = Article::where('category_id', $categoryId)
            ->where('status', true)
            ->latest()
            ->paginate(8);

        $categories = Category::all();
        $information = Information::latest()->limit(5)->get();
        $user = User::first();

        return view('home.article.main', compact('articles', 'categories', 'information', 'user'));
    }

    // PRODUCT CONTROLLER
    public function products(Request $request)
    {
        $query = Products::where('status', true)->latest();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // PAGINATION
        $products = $query->paginate(8);

        $categories = WebsiteCategory::all();
        $information = Information::latest()->limit(5)->get();
        $user = User::first();

        return view('home.price.main', compact('products', 'categories', 'information', 'user'));
    }

    // DISPLAY ARTICLE
    public function productsShow($slug)
    {
        $products = Products::where('slug', $slug)->firstOrFail();
        $categories = WebsiteCategory::all();
        $information = Information::latest()->limit(5)->get();
        $user = User::first();

        return view('home.price.show', compact('products', 'categories', 'information', 'user'));
    }

    public function productsCategories($categoryId)
    {
        $products = Products::where('website_category_id', $categoryId)
            ->where('status', true)
            ->latest()
            ->paginate(8);

        $categories = WebsiteCategory::all();
        $information = Information::latest()->limit(5)->get();
        $user = User::first();

        return view('home.price.main', compact('products', 'categories', 'information', 'user'));
    }

    // DISPLAY INFORMATION
    public function informationShow($slug)
    {
        $information = Information::where('slug', $slug)->firstOrFail();
        $user = User::first();

        return view('home.information.show', compact('information', 'user'));
    }
}
