<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view()
    {
    }

    public function store(Request $request, Product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();

        if ($user) {
            $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => 1
                ]);
            }
        } else {
            $cartItems = Cart::getCookieCartItems();
            $isProductExists = false;

            foreach ($cartItems as $item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] += $quantity;
                    $isProductExists = true;
                    break;
                }
            }

            if (!$isProductExists) {
                $cartItems[] = [
                    'user_id' => null,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ];
            }

            Cart::setCookieCartItems($cartItems);
        }

        return redirect()->back()->with('success', 'Cart Added Successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $quantity = $request->integer('quantity');
        $user = $request->user();

        if ($user) {
            CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);
        } else {
            $cartItems = Cart::getCookieCartItems();
            foreach ($cartItems as $item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }

            Cart::setCookieCartItems($cartItems);
        }

        return redirect()->back();
    }

    public function destroy(Request $request, Product $product)
    {
        $user = $request->user();

        if ($user) {
            CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()->delete();
            if (CartItem::count() <= 0) {
                return redirect()->back()->with('info', 'Your Cart is Empty');
            } else {
                return redirect()->back()->with('success', 'Item Removed Successfully.');
            }
        } else {
            $cartItems = Cart::getCookieCartItems();
            foreach ($cartItems as $i => $item) {
                if ($item['product_id'] === $product->id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }

            Cart::setCookieCartItems();
            if (count($cartItems) <= 0) {
                return redirect()->back()->with('info', 'Your Cart is Empty');
            } else {
                return redirect()->back()->with('success', 'Item Removed Successfully.');
            }
        }
    }
}