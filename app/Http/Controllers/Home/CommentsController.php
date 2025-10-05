<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comments;

class CommentsController extends Controller
{
    public function store(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with([
                'messages' => 'Silahkan login terlebih dahulu',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }

        if (!$request->content) {
            return redirect()->back()->with([
                'messages' => 'Komentar tidak boleh kosong',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }

        $article = Article::where('slug', $slug)->firstOrFail();

        Comments::create([
            'article_id' => $article->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $slug, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with([
                'messages' => 'Silahkan login terlebih dahulu',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }

        if (!$request->content) {
            return redirect()->back()->with([
                'messages' => 'Komentar tidak boleh kosong',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }
        
        $comment = Comments::where('id', $id)->whereHas('article', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->firstOrFail();

        $comment->update(['content' => $request->content]);

        return redirect()->back()->with('success', 'Komentar berhasil diupdate!');
    }

    public function destroy($slug, $id)
    {
        $comment = Comments::where('id', $id)->whereHas('article', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->firstOrFail();

        $comment->delete();

        return redirect()->back()->with([
                'messages' => 'Komentar berhasil dihapus',
                'type' => 'success',
                'id' => 'success-notification'
            ]);;
    }
}
