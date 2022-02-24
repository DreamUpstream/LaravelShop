<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $dummyProducts = $this->dummyData();
        // shuffle($dummyProducts);
        // return view('products.index', ['dummyProducts' => $dummyProducts]);
        
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
                    $query->where('productRating', 1);
                    break;

                case 2:
                    $query->where('productRating', 2);
                    break;

                case 3:
                    $query->where('productRating', 3);
                    break;
                
                case 4:
                    $query->where('productRating', 4);
                    break;

                case 5:
                    $query->where('productRating', 5);
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

        $view = view('products.index', compact('products', 'categories'));

        
        $view->with('ordering', [
            'a-z'   => 'Alphabetically, A-Z',
            'z-a'  => 'Alphabetically, Z-A',
            'low-high'  => 'Price, low to high',
            'high-low' => 'Price, high to low',
        ]);

        return $view;
    }

    // public function dummyData() {
    //     $dummyProducts = [
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_01.jpg",
    //                 "productPrice" => 59.99,
    //                 "productRating" => 4,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_02.jpg",
    //                 "productPrice" => 19.99,
    //                 "productRating" => 3,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_03.jpg",
    //                 "productPrice" => 69.99,
    //                 "productRating" => 5,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_04.jpg",
    //                 "productPrice" => 99.99,
    //                 "productRating" => 2,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_05.jpg",
    //                 "productPrice" => 199.99,
    //                 "productRating" => 1,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_06.jpg",
    //                 "productPrice" => 129.99,
    //                 "productRating" => 4,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_07.jpg",
    //                 "productPrice" => 99.99,
    //                 "productRating" => 5,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_08.jpg",
    //                 "productPrice" => 79.99,
    //                 "productRating" => 3,
    //             ],
    //             [
    //                 "productName" => "Example product",
    //                 "productSizes" => "M/L/X/XL",
    //                 "productPhoto" => "shop_09.jpg",
    //                 "productPrice" => 59.99,
    //                 "productRating" => 5,
    //             ]
    //     ];
    //     return $dummyProducts;
    // }
}
