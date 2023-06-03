<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{

    //create-form
    public function create(Request $request)
    {
        return view('create-product');
    }



    //store from create form
    public function store(StoreProductRequest $request)
    {

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'threepiecesprice' => $request->threepiecesprice,
            'fivepiecesprice' => $request->fivepiecesprice,
            'instock' => $request->instock == 'on' ? '1' : '0',
            'product_pics' => $this->imageProcess($request),
        ]);


        return redirect('/dashboard')->with('message', 'Product was Created');

    }

    //process image from form
    private function imageProcess($request)
    {

        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $request->name . '.' . $request->image->extension();
            $image = $request->file('image');
            $image->move(storage_path('app/public/images'), $newImageName);
            return $newImageName;
        }
        return;
    }

    //single product page
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('single-product', compact('product'));
    }

    //edit product
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        //
        return view('edit-product', compact('product'));
    }

    //update product
    public function update(EditProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        if ($product) {

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'threepiecesprice' => $request->threepiecesprice,
                'fivepiecesprice' => $request->fivepiecesprice,
                'instock' => $request->instock == 'on' ? '1' : '0',
                'product_pics' => $request->image == null ? $product->product_pics : $this->imageProcess($request),
            ]);
            //
            return redirect('/dashboard')->with('message', $product->name . ' ' . 'Product Update');
        }
        return redirect('/dashboard')->with('message', 'Error Product Not Updated');
    }

    //delete product
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product) {
            $imagePath = 'storage/images/' . $product->product_pics;

           if(file_exists($imagePath))
           {
            unlink($imagePath);
           }

            $product->delete();
            return redirect('/dashboard')->with('message', 'Product Deleted');
        }

        return redirect('/dashboard')->with('message', 'Error Product Not Deleted');
    }
}