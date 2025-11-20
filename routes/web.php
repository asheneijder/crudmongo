<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Category; // Import Category
use App\Models\Product;  // Import Product

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

// --- New Test Route ---
Route::get('/test-relationship', function () {
    // 1. Create a dummy Category
    $category = Category::create([
        'name' => 'Electronics',
        'slug' => 'electronics-'.uniqid() // Unique slug for testing
    ]);

    // 2. Create a Product and link it to the Category ID
    $product = Product::create([
        'name' => 'Test Smartphone',
        'detail' => 'A device linked to Electronics',
        'category_id' => $category->id
    ]);

    // 3. Test: Fetch the product and try to access the category name via the relationship
    $fetchedProduct = Product::with('category')->find($product->id);

    return response()->json([
        'status' => 'Success',
        'message' => 'Created a category and linked a product to it.',
        'product_name' => $fetchedProduct->name,
        'linked_category' => $fetchedProduct->category->name, // This proves the relationship works
        'category_id' => $fetchedProduct->category_id
    ]);
});