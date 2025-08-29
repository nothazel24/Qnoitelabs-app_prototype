<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Article::with(['user', 'category'])->latest();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user && $user->isAuthor()) {
            $query->where('user_id', $user->id);
        }

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('status')) {
            $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($status !== null) {
                $query->where('status', $status);
            }
        }

        $articles = $query->paginate(10);

        return view('admin.articles.index', compact('articles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'meta_desc' => 'required|string',
            // 'slug' => 'required|string|unique:articles,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'status' => 'nullable|boolean',
        ]);

        // VALIDASI DUPLIKASI SLUG
        $slug = Str::slug($request->title);
        $count = Article::where('slug', $slug)->count();

        if ($count > 0) {
            return redirect()->route('admin.article.index')->with([
                'messages' => 'Judul artikel telah digunakan, gunakan judul yang lain.',
                'type' => 'danger',
                'id' => 'fail-notification'
            ]);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
        ]);

        return redirect()->route('admin.article.index')->with([
            'messages' => 'Artikel berhasil dibuat.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $article->user_id && !$user->isAdmin()) {
            abort(403);
        }

        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $article->user_id && !$user->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'status' => 'nullable|boolean',
        ]);

        // VALIDASI DUPLIKASI SLUG
        $slug = Str::slug($request->title);
        $count = Article::where('slug', $slug)->count();

        if ($count > 0) {
            return redirect()->route('admin.article.index')->with([
                'messages' => 'Judul artikel telah digunakan, gunakan judul yang lain.',
                'type' => 'danger',
                'id' => 'fail-notification'
            ]);
        }

        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
        } elseif ($request->input('remove_image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
                $imagePath = null;
            }
        }

        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
        ]);

        return redirect()->route('admin.article.index')->with([
            'messages' => 'Artikel berhasil diperbaharui.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $article->user_id && !$user->isAdmin()) {
            abort(403);
        }

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();
        return redirect()->route('admin.article.index')->with([
            'messages' => 'Artikel berhasil dihapus.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }
}
