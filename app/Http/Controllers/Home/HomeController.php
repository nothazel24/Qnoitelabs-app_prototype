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

use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    // DISPLAY PRODUCT
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

    // USER PROFILE EDIT
    public function userEdit(Request $request)
    {
        return view('home.user.edit.main', [
            'user' => $request->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function userUpdate(Request $request)
    {
        $user = $request->user();

        $rules = [
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', Rule::in(['Laki-laki', 'Perempuan', 'Lainnya'])],
            'image' => ['nullable', 'image', 'max:2048'],
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'string', 'min:8', 'comfirmed']
        ];

        $request->validate($rules);

        $imagePath = $user->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            // Simpan gambar baru ke folder 'users' di disk 'public'
            $imagePath = $request->file('image')->store('users', 'public');
        } elseif ($request->input('remove_image')) {
            // Jika user memilih untuk menghapus gambar
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
                $imagePath = null;
            }
        }

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->instagram = $request->instagram;
        $user->gender = $request->gender;
        $user->image = $imagePath;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Update password hanya jika field password diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::route('home.user.edit')->with([
            'messages' => 'Profil pengguna berhasil diperbaharui.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function userDestroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logika pengalihan artikel dari user/author ke admin
        $adminUser = User::where('role', 'admin')->first();
        if (!$adminUser) {
            return Redirect::back()->with([
                'messages' => 'Tidak bisa menghapus akun. Admin user tidak dapat ditemukan untuk men-transfer artikel',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }

        // Mengalihkan kepemilikan artikel 
        Article::where('user_id', $user->id)->update(['user_id' => $adminUser->id]);

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with([
            'messages' => 'Akun berhasil dihapus. Dan semua artikel yang ditulis terlah berhasil ditransfer ke Administrator.',
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }
}
