<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Models\Products\Product::where('is_active', true);

        if ($request->has('category') && is_numeric($request->category)) {
            $query->where('category_id', $request->category);
        }
        if ($request->has('price') && is_numeric($request->price)) {
            switch ($request->price) {
            case 50:
                $query->where('price', '<' , 50);
                break;

            case 100:
                $query->where('price', '<' , 100);
                break;

            case 150:
                $query->where('price', '<' , 150);
                break;
            
            case 200:
                $query->where('price', '>' , 200);
                break;
            }
        }

        if ($request->has('rating') && is_numeric($request->rating)) {
            switch ($request->rating) {
                case 1:
                    $query->where('product_rating', 1);
                    break;

                case 2:
                    $query->where('product_rating', 2);
                    break;

                case 3:
                    $query->where('product_rating', 3);
                    break;
                
                case 4:
                    $query->where('product_rating', 4);
                    break;

                case 5:
                    $query->where('product_rating', 5);
                    break;
            }
        }

        if ($request->has('search') && is_string($request->search)) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        switch ($request->order_by) {
            case 'z-a':
                $query->orderBy('name', 'desc');
                break;

            case 'low-high':
                $query->orderBy('price');
                break;

            case 'high-low':
                $query->orderBy('price', 'desc');
                break;
            
            default:
                $query->orderBy('name');
                break;
        }

        if ($request->order_by == 'price') {
            $query->orderBy('price');
        } else {
            $query->orderBy('name');
        }

        $products = $query->get();

        $categories = Models\Products\Category::get();

        // ==== FROM BLADE VIEW BRANCH ===
        // $view = view('products.index', compact('products', 'categories'));

        
        // $view->with('ordering', [
        //     'a-z'   => 'Alphabetically, A-Z',
        //     'z-a'  => 'Alphabetically, Z-A',
        //     'low-high'  => 'Price, low to high',
        //     'high-low' => 'Price, high to low',
        // ]);

        // return $view;
        return response()->json(compact('products'));
    }

    // ==== FROM BLADE VIEW BRANCH ===
    // public function showProduct(Request $request, $name, $id)
    // {
    //     $product = Models\Products\Product::where('is_active', true)->where('id', $id)->first();
    //     $relatedProducts = Models\Products\Product::where('is_active', true)->where('id', '!=' , $id)->get();
    //     return view('products.productIndex', compact('product', 'relatedProducts'));
    // }

    public function storeProduct(Requests\StoreProductRequest $request)
    {
        
        $product = new Models\Products\Product($request->validated());
        if ($request->hasFile('image')) {
            $uid = Str::uuid();
            $fileExt = $request->file("image")->extension();
            $product->image = $request->file("image")->storeAs(
                'public/img/products',
                "shop_".$uid.'.'.$fileExt
            );
            $product->image = "shop_".$uid.'.'.$fileExt;
        }
        else {
            $product->image ="shop_example.jpg";
        }
        $product->save();
        return response()->json(array("message"=>"Saved successfully"));
    }

}


