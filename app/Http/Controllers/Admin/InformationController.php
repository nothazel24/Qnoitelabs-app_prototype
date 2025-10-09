<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Information::latest();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $information = $query->paginate(10);
        $user = Auth::user();

        return view('admin.information.index', compact('information', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        // VALIDASI DULPLIKASI SLUG
        $slug = Str::slug($request->title);
        $count = Information::where('slug', $slug)->count();

        if ($count > 0) {
            return redirect()->route('admin.information.index')->with([
                'messages' => 'Judul informasi telah digunakan, gunakan judul yang lain.',
                'type' => 'danger',
                'id' => 'fail-notification'
            ]);
        }

        Information::create([
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'slug' => $slug,
            'content' => $request->content,
            'status' => $request->boolean('status', false),
        ]);

        return redirect()->route('admin.information.index')->with([
            'messages' => 'Informasi berhasil dibuat.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        return view('admin.information.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        return view('admin.information.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $slug = Str::slug($request->title);

        $information->update([
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'slug' => $slug,
            'content' => $request->content,
            'status' => $request->boolean('status', false),
        ]);

        return redirect()->route('admin.information.index')->with([
            'messages' => 'Informasi berhasil diupdate.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return redirect()->route('admin.information.index')->with([
            'messages' => 'Informasi berhasil dihapus.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }
}
