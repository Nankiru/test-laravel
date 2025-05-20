<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    public function AddbrandCategory(Request $request){
        $request->validate([
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        // Check if brand and category already exist
        $exists = Product::where('brand', $request->brand)
                         ->where('category', $request->category)
                         ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'This brand and category already exist.');
        }

        // Save new brand/category
        $add = new Product();
        $add->brand = $request->brand;
        $add->category = $request->category;
        $add->save();

        return redirect()->back()->with('success', 'Brand and category added successfully.');

    }
    public function FormProduct()
    {
        return view('pages.form_product');
    }


    public function index()
    {
        // $productsall = Product::where('status', 1)->paginate(8);
        $products = Product::where('status', 1)->orderBy('id', 'desc')->paginate(1000);
        $new_products = Product::where('status', 1)->orderBy('id', 'desc')->whereDate('created_at', \Carbon\Carbon::today())->paginate(8);
        $laptops = Product::where('category', 'Laptops')->where('status',1)->orderBy('id', 'desc')->paginate(8);
        $smartphones = Product::where('category', 'Smartphone')->where('status',1)
            ->orderBy('id', 'desc')
            ->paginate(8);
        $tablets = Product::where('category', 'Tablet')->orderBy('id', 'DESC')->paginate(8);
        return view('customerpage/index', compact('products', 'new_products', 'laptops', 'tablets', 'smartphones'));
    }

public function addProduct(Request $request)
{
    $products = new Product();

    $products->name = $request->name;
    $products->description = $request->description;
    $products->price = $request->price;
    $products->discount_price = $request->discount_price;
    $products->storage = $request->storage;
    $products->ram = $request->ram;
    $products->screen_size = $request->screen_size;
    $products->cpu = $request->cpu;
    $products->os = $request->os;
    $products->tags = $request->tags;
    $products->stock = $request->stock;
    $products->category = $request->category;
    $products->brand = $request->brand;
    $products->status = 1;

    // ✅ Upload main image to Cloudinary
    if ($request->hasFile('image')) {
        $uploadedImageUrl = Cloudinary::upload(
            $request->file('image')->getRealPath(),
            ['folder' => 'products/mainimages']
        )->getSecurePath();
        $products->image = $uploadedImageUrl;
    }

    // ✅ Upload gallery images to Cloudinary
    if ($request->hasFile('img1')) {
        $img1Url = Cloudinary::upload(
            $request->file('img1')->getRealPath(),
            ['folder' => 'products/galleries']
        )->getSecurePath();
        $products->img1 = $img1Url;
    }

    if ($request->hasFile('img2')) {
        $img2Url = Cloudinary::upload(
            $request->file('img2')->getRealPath(),
            ['folder' => 'products/galleries']
        )->getSecurePath();
        $products->img2 = $img2Url;
    }

    if ($request->hasFile('img3')) {
        $img3Url = Cloudinary::upload(
            $request->file('img3')->getRealPath(),
            ['folder' => 'products/galleries']
        )->getSecurePath();
        $products->img3 = $img3Url;
    }

    $products->created_at = now();
    $products->updated_at = now();
    $products->save();

    if ($products) {
        return redirect('/dashboard')->with('success', 'Product ' . $products->name . ' added successfully!');
    } else {
        return redirect('/form_product')->with('error', 'Failed to add product.');
    }
}



    public function search(Request $request)
    {
        // Retrieve the search term from input
        $search = $request->input('search');

        // Build the query and paginate results
        $products = Product::where('name', 'like', "%{$search}%")
            ->paginate(5)                   // paginate instead of get
            ->appends(['search' => $search]); // preserve query string

        // Return the view with paginated products and the original search term
        return view('pages.list_product', [
            'products'  => $products,
            'search' => $search,
        ]);
    }

    public function ProductList(Request $request)
    {
        $query = Product::where('status', 1);

        // If there is a search term, apply the filter
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Use paginate() instead of get() to return a paginator
        $products = $query->orderBy('created_at', 'DESC')->paginate(5);

        // Make sure to keep the search term in the pagination links
        $products->appends($request->all());

        return view('pages/list_product', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function CartView()
    {
        return view('pages.cart');
    }


    public function ProductDetail($id)
    {
        $product_detail = Product::findOrFail($id);
        $similar_items = Product::where('category', $product_detail->category)
            // $similar_items = Product::where('status', 1)
            ->where('id', '!=', $id)
            ->take(5)
            ->get();
            $comments = Comment::with('user')->latest()->get();

        return view('details/product-detail', compact('product_detail', 'similar_items','comments'));
    }


    public function filterByCategoryBrand($category, $brand)
    {
        $products = Product::where('category', $category)
            ->where('brand', $brand)
            ->get();

        return view('customerpage/all-product', compact('products', 'category', 'brand'));
    }

    // ⁡⁢⁣⁢filterByCategory⁡
    public function filterByCategory($category)
    {
        $products = Product::where('category', $category)
            ->get();

        return view('customerpage/all-product', compact('products', 'category'));
    }

    /**
     * Display the specified resource.
     */


    public function delete($id)
    {
        $products = Product::find($id);
        if ($products) {
            $products->status = 0;
            $products->save();
            return redirect('/dashboard')->with('success', 'Product deleted successfully');
        }
        return redirect('/product')->with('error', 'Product not found');
    }

    public function UpdateProduct($id, Request $request)
{
    $products = Product::find($id);

    if (!$products) {
        return back()->with('error', 'Product not found.');
    }

    // Update basic fields
    $products->name = $request->name;
    $products->description = $request->description;
    $products->price = $request->price;
    $products->discount_price = $request->discount_price;
    $products->storage = $request->storage;
    $products->ram = $request->ram;
    $products->tags = $request->tags;
    $products->stock = $request->stock;
    $products->category = $request->category;
    $products->brand = $request->brand;

    // Check and update image if uploaded
    if ($request->hasFile('image')) {
        // Delete old image
        if ($products->image && file_exists(public_path('uploads/products/galaries/' . $products->image))) {
            unlink(public_path('uploads/products/galaries/' . $products->image));
        }

        // Store new image
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/products/galaries/'), $imageName);
        $products->image = $imageName;

        // Update session if necessary
        if (session('id') == $id) {
            session(['img' => $imageName]);
        }
    }

    $products->updated_at = now();
    $products->save();

    return redirect('/product')->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
