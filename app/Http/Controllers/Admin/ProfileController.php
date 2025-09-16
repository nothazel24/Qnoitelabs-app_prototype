<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Article; 

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $rules = [
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', Rule::in(['Laki-laki', 'Prempuan', 'Lainnya'])],
            'image' => ['nullable', 'image', 'max:2048'],
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'string', 'min:8', 'comfirmed'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:10'],
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
        $user->address = $request->address;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Update password hanya jika field password diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::route('admin.profile.edit')->with([
            'messages' => 'Profil pengguna berhasil diperbaharui.', 
            'type' => 'success',
            'id' => 'success-notification'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
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
