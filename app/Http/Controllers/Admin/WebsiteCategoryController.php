<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsiteCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = WebsiteCategory::with('products')->orderBy('name');

        // Cek apakah ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            // Tambahkan kondisi pencarian berdasarkan nama atau email
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil hasil paginasi
        $webCategories = $query->paginate(10);

        return view('admin.webCategories.index', compact('webCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.webCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:website_categories,name',
        ]);

        WebsiteCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.webCategories.index')->with([
            'messages' => 'Kategori berhasil dibuat.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsiteCategory $webCategory)
    {
        return view('admin.webCategories.edit', compact('webCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteCategory $webCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:website_categories,name,' . $webCategory->id,
        ]);

        $webCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.webCategories.index')->with([
            'messages' => 'Kategori berhasil diperbaharui.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteCategory $webCategory)
    {
        $webCategory->delete();
        return redirect()->route('admin.webCategories.index')->with([
            'messages' => 'Kategori berhasil dihapus.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }
}
