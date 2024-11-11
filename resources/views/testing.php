<?php


/ routes/web.php

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::post('/cart/remove', [CartController::class, 'remove']);


php artisan make:controller CartController



// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        $cart[] = $request->input('item'); // Assuming 'item' is the item data
        return response()->json(['success' => true])->withCookie(cookie('cart', json_encode($cart), 60));
    }

    public function update(Request $request)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        // Update logic here, e.g., update quantity
        return response()->json(['success' => true])->withCookie(cookie('cart', json_encode($cart), 60));
    }

    public function remove(Request $request)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        // Remove logic here
        return response()->json(['success' => true])->withCookie(cookie('cart', json_encode($cart), 60));
    }
}


<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Your Shopping Cart</h1>
    <ul>
        @foreach($cart as $item)
            <li>{{ $item }}</li> <!-- Display your item details -->
        @endforeach
    </ul>
@endsection