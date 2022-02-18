<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $dummyProducts = $this->dummyData();
        shuffle($dummyProducts);
        return view('products.index', ['dummyProducts' => $dummyProducts]);
    }

    public function dummyData() {
        $dummyProducts = [
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_01.jpg",
                    "productPrice" => 59.99,
                    "productRating" => 4,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_02.jpg",
                    "productPrice" => 19.99,
                    "productRating" => 3,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_03.jpg",
                    "productPrice" => 69.99,
                    "productRating" => 5,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_04.jpg",
                    "productPrice" => 99.99,
                    "productRating" => 2,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_05.jpg",
                    "productPrice" => 199.99,
                    "productRating" => 1,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_06.jpg",
                    "productPrice" => 129.99,
                    "productRating" => 4,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_07.jpg",
                    "productPrice" => 99.99,
                    "productRating" => 5,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_08.jpg",
                    "productPrice" => 79.99,
                    "productRating" => 3,
                ],
                [
                    "productName" => "Example product",
                    "productSizes" => "M/L/X/XL",
                    "productPhoto" => "shop_09.jpg",
                    "productPrice" => 59.99,
                    "productRating" => 5,
                ]
        ];
        return $dummyProducts;
    }
}
