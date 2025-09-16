<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Whistlist;
use App\Models\WhistlistItem;
use App\Models\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class WhistlistController extends Controller
{
    protected function getOrCreateWhistlist()
    {
        if (Auth::check()) {
            $whistlist = Whistlist::firstOrCreate(['user_id' => Auth::id()]);
            $sessionId = Session::getId();
            $guestWhistlist = Whistlist::where('session_id', $sessionId)->whereNull('user_id')->first();
            if ($guestWhistlist && $guestWhistlist->id !== $whistlist->id) {
                foreach ($guestWhistlist->items as $guestItem) {
                    $existingItem = $whistlist->items()->where('product_id', $guestItem->product_id)->first();
                    if ($existingItem) {
                        $existingItem->quantity += $guestItem->quantity;
                        $existingItem->save();
                    } else {
                        $guestItem->Whistlist_id = $whistlist->id;
                        $guestItem->save();
                    }
                }
                $guestWhistlist->delete();
            }
            $whistlist->session_id = null;
            $whistlist->save();
            return $whistlist;
        } else {
            $sessionId = Session::getId();
            return Whistlist::firstOrCreate(['session_id' => $sessionId, 'user_id' => null]);
        }
    }

    public function addToWhistlist(Products $product, Request $request)
    {
        if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isAuthor())) {
            return redirect()->back()->with([
                'messages' => 'Hanya user yang bisa lakukan Whistlist, Atmin kerja sana!',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }

        $whistlist = $this->getOrCreateWhistlist();
        $whistlistItem = $whistlist->items()->where('product_id', $product->id)->first();

        try {
            DB::beginTransaction();
            if ($whistlistItem) {
                $whistlistItem->save();
            } else {
                $whistlist->items()->create([
                    'product_id' => $product->id,
                    'price_at_add' => $product->price,
                    'discount_at_add' => $product->discount,
                ]);
            }
            DB::commit();
            return redirect()->back()->with([
                'messages' => $product->title . ' berhasil dimasukkan ke daftar keinginanmu!',
                'type' => 'success',
                'id' => 'success-notification'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Add to cart failed: ' . $e->getMessage());
            return redirect()->back()->with([
                'messages' => 'Aww, sayang sekali, produk yang kamu inginkan tidak bisa kamu masukan kedalam daftar keinginanmu :( : ' . $e->getMessage(),
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }
    }

    public function showWhistlist()
    {
        $whistlist = $this->getOrCreateWhistlist();
        $whistlistItems = $whistlist->items()->with('product')->get();

        return view('home.whistlist.show', compact('whistlistItems'));
    }

    public function removeWhistlist($slug)
    {
        if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isAuthor())) {
            return redirect()->back()->with([
                'messages' => 'Hanya user yang dapat menghapus produk dari whistlist.',
                'type' => 'info',
                'id' => 'info-notificaiton'
            ]);
        }

        $whistlist = $this->getOrCreateWhistlist();
        $product = Products::where('slug', $slug)->first();
        if (!$product) {
            return redirect()->route('home.whistlist.show')->with([
                'messages' => 'Produk tidak ditemukan atau sudah tidak tersedia.',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }
        try {
            $whistlistItem = $whistlist->items()->where('product_id', $product->id)->first();
            if ($whistlistItem) {
                $whistlistItem->delete();
                return redirect()->route('home.whistlist.show')->with([
                    'messages' => 'Produk berhasil dihapus dari daftar keinginanmu!.',
                    'type' => 'success',
                    'id' => 'success-notification'
                ]);
            }
            return redirect()->route('home.whistlist.show')->with([
                'messages' => 'Produk tidak ada dalam daftar keinginanmu.',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        } catch (\Exception $e) {
            Log::error('Remove whistlist item failed: ' . $e->getMessage());
            return redirect()->route('home.whistlist.show')->with([
                'messages' => 'Aww..., maaf, untuk saat ini sepertinya kami tidak dapat menghapus daftar keinginanmu saat ini :(, coba lagi nanti: ' . $e->getMessage(),
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }
    }
}
