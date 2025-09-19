<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use App\Models\WebsiteCategory;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Portofolio::query();

        /** @var \App\Models\User $user */
        $user = Auth::user();

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

        // Ambil hasil paginasi
        $portofolios = $query->paginate(10);

        return view('admin.portofolios.index', compact('portofolios', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $portofolios = WebsiteCategory::all();
        return view('admin.portofolios.create', compact('portofolios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'website_category_id' => 'required|exists:website_categories,id',
            'content' => 'required|string',
            'meta_desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // 2MB Max
            'status' => 'nullable|boolean',
            'client' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'repo_url' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portofolios', 'public');
        }

        Portofolio::create([
            'website_category_id' => $request->website_category_id,
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
            'client' => $request->client,
            'demo_url' => $request->demo_url,
            'repo_url' => $request->repo_url
        ]);

        return redirect()->route('admin.portofolios.index')->with([
            'messages' => 'Portofolio berhasil dibuat.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        return view('admin.portofolios.show', compact('portofolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $portofolio->user_id && !$user->isAdmin()) {
            abort(403);
        }

        $categories = WebsiteCategory::all();
        return view('admin.portofolios.edit', compact('portofolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $portofolio->user_id && !$user->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'website_category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'status' => 'nullable|boolean',
            'client' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'repo_url' => 'nullable|url',
        ]);

        $imagePath = $portofolio->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($portofolio->image) {
                Storage::disk('public')->delete($portofolio->image);
            }
            // KOREKSI: Menyimpan langsung ke disk 'public' di folder 'portofolios'
            $imagePath = $request->file('image')->store('portofolios', 'public');
        } elseif ($request->input('remove_image')) {
            // Jika user memilih untuk menghapus gambar
            if ($portofolio->image) {
                Storage::disk('public')->delete($portofolio->image);
                $imagePath = null;
            }
        }

        $portofolio->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
            'client' => $request->client,
            'demo_url' => $request->demo_url,
            'repo_url' => $request->repo_url
        ]);

        return redirect()->route('admin.portofolios.index')->with([
            'messages' => 'Portofolio berhasil diperbaharui.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $portofolio->user_id && !$user->isAdmin()) {
            abort(403);
        }

        if ($portofolio->image) {
            Storage::disk('public')->delete($portofolio->image);
        }

        $portofolio->delete();
        return redirect()->route('admin.portofolios.index')->with([
            'messages' => 'Portofolio berhasil dihapus.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }
}
