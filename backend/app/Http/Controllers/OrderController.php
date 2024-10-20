<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
 public function index(Request $request)
{
    // Mendapatkan semua orderan
    $orders = Order::all();
    
    return response()->json($orders);
}



  public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, validasi file gambar
        ]);

        // Jika ada gambar, upload gambar ke storage
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path;
        }

        // Simpan order ke database
        $order = Order::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category' => $validatedData['category'],
            'image' => $validatedData['image'] ?? null,
            'status' => 'pending', // Default status
        ]);

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }


}
