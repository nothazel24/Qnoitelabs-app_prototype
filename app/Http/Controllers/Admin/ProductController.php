<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\WebsiteCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Products::with(['user', 'website_category'])->latest();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Jika pengguna adalah author, hanya tampilkan artikel miliknya
        if ($user && $user->isAuthor()) {
            $query->where('user_id', $user->id);
        }

        // Cek apakah ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            // Tambahkan kondisi pencarian berdasarkan 'title' artikel
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // Cek apakah ada parameter 'status' dalam request
        if ($request->has('status')) {
            $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($status !== null) {
                $query->where('status', $status);
            }
        }

        // Ambil hasil paginasi
        $products = $query->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = WebsiteCategory::all();
        return view('admin.products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Products $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'website_category_id' => 'required|exists:website_categories,id',
            'content' => 'required|string',
            'meta_desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // 2MB Max
            'status' => 'nullable|boolean',
            'price' => 'required|numeric|min:0',

            // Jika ada kesalahan dalam penghitungan harga, perhatikan konfigurasi dibawah
            'discount' => 'nullable|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|max:50|unique:products,sku' . $product->id,
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Products::create([
            'user_id' => Auth::id(),
            'website_category_id' => $request->website_category_id,
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'sku' => $request->sku ?? strtoupper(Str::random(5)), 
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $product->user_id && !$user->isAdmin()) {
            abort(403);
        }

        $categories = WebsiteCategory::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $product->user_id && !$user->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'website_category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'status' => 'nullable|boolean',
            'price' => 'required|numeric|min:0',

            // Jika ada kesalahan dalam penghitungan harga, perhatikan konfigurasi dibawah
            'discount' => 'nullable|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|max:50|unique:products,sku' . $product->id,
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // KOREKSI: Menyimpan langsung ke disk 'public' di folder 'products'
            $imagePath = $request->file('image')->store('products', 'public');
        } elseif ($request->input('remove_image')) {
            // Jika user memilih untuk menghapus gambar
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
                $imagePath = null;
            }
        }

        $product->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'sku' => $request->sku ?? strtoupper(Str::random(5)),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->id !== $product->user_id && !$user->isAdmin()) {
            abort(403);
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
