<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);
        $categories = Category::all();
        return view('back/products', ["products" => $products, "categories" => $categories]);
    }

    protected function insertData(Product $product, Request $request, string $fileName) {
        $product["name"] = $request->input("name");
        $product["description"] = $request->input("description");
        $product["price"] = $request->input("price");
        $product["quantity"] = $request->input("quantity");
        $product["category_id"] = $request->input("category_id");
        $product['image'] = $fileName;
        $product->save();
    }

    public function search(Request $request)
    {
        $query = $request->input('query') ?? '';
        $category = $request->input('category');
        $products = Product::where('name', 'like', '%'.$query.'%');

        if ($category) {
            $products = $products->where('category_id', $category);
        }

        $products = $products->paginate(2)->appends(['query' => $query, 'category' => $category]);
        $categories = Category::all();

        return view('back.products', ["products" => $products, "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required||numeric",
            "quantity" => "required||numeric",
            "category_id" => "required||filled",
            'img' => 'required|image|mimes:jpeg,png,pdf|max:10240'
        ]);

        # Upload File :
        $file = $request->file('img');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $request->file('img')->move(public_path('uploads'), $fileName);

        # Send Data to Database :
        $product = new Product;
        $this->insertData($product, $request, $fileName);
        return redirect('/admin/products');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', '=', $id)
            ->select('products.*', 'categories.name as category')
            ->first();
        $categories = Category::all();
        return view('back/product', ["product" => $product, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required||numeric",
            "quantity" => "required||numeric",
            "category_id" => "required||filled",
            'img' => 'required|image|mimes:jpeg,png,pdf|max:10240'
        ]);

        # Upload File :
        $file = $request->file('img');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $request->file('img')->move(public_path('uploads'), $fileName);

        $product = Product::find($request->input('id'));
        $this->insertData($product, $request, $fileName);
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id)->delete();
        return redirect('/admin/products');
    }
}
