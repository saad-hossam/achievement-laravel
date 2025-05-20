<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

class ProductController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with(['category'])->get();
        // dd($products);
        return view('dashboard.products.index',['products'=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('dashboard.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
{
    // Exclude unnecessary fields
    $data = $request->except(['_token', 'ar', 'en', 'image', 'sale']);

    // Add department ID to the data
    $data['department_id'] = $request->input('category_id');  // Use 'category_id' from the form

    // Sale condition
    if ($request->sale) {
        $data['sale'] = 'onsale';
    } else {
        $data['sale'] = 'outsale';
    }

    // Save image
    $finalImagePathName = $this->SaveImage('images/products/layout', $request->file('image'));
    $data['image'] = $finalImagePathName;

    // Create the product
    $product = Product::create($data);

    // Add translations
    $locales = array_keys(config('app.languages'));
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $product->translateOrNew($locale)->name = $request->input("$locale.name");
            $product->translateOrNew($locale)->description = $request->input("$locale.description");
            $product->translateOrNew($locale)->body = $request->input("$locale.body");
        }
    }

    // Save the product with translations
    $product->save();

    // Redirect to the products index
    return redirect()->route('products.index');
}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
         return view('dashboard.products.edit',['categories'=>$categories,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
{
    // Exclude unnecessary fields
    $data = $request->except(['_token', 'ar', 'en', 'image', 'sale']);

    // Handle the sale status
    $data['sale'] = $request->sale ? 'onsale' : 'outsale';

    // Handle image upload with size checks and optimization
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Validate image size and type
        if ($image->getSize() > 1024 * 1024 * 10) { // 10MB limit
            return redirect()->back()->withErrors(['image' => 'Image size must not exceed 10MB']);
        }

        $finalImagePathName = $this->SaveImage('images/products/layout', $image);
        $data['image'] = $finalImagePathName;
    }

    // Update product base data
    $product->update($data);

    // Handle translations
    $locales = array_keys(config('app.languages'));
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $product->translateOrNew($locale)->name = $request->input("$locale.name");
            $product->translateOrNew($locale)->description = $request->input("$locale.description");
            $product->translateOrNew($locale)->body = $request->input("$locale.body");
        }
    }

    // Save the product with translations
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product=Product::find($request->product_id);
        $product->translations()->delete();
        $product->delete();
        return redirect()->route('products.index');

    }

    public function saveAttachmentPhotos(Request $request)
    {
        // dd(1);
        $request->validate([
            'photo'=>'required',
            'photo.*' => 'mimes:png,jpg,jpeg|max:1024'
        ]);
        $photoes=$request->file('photo');

        $product=Product::find($request->id);
        // dd($photoes);
        foreach ($photoes as $photo) {
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/products/attachments/', $photo,475,435);
           $product->photos()->create([
            'src'=> $finalImagePathName,
            'type'=>'image'
           ]);
        }
       return redirect()->back();

    }
}
