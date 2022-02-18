<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $dummyOrders = $this->dummyData();
        shuffle($dummyOrders);
        return view('orders.index', ['dummyOrders' => $dummyOrders]);
    }

    public function dummyData() {
        $dummyOrders = [
                [
                    "productName" => "Example product",
                    "productSize" => "M",
                    "SKU" => 564765811,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "L",
                    "SKU" => 789665822,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "XL",
                    "SKU" => 654765833,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "S",
                    "SKU" => 321765844,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "M",
                    "SKU" => 123765855,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "L",
                    "SKU" => 987765866,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "XL",
                    "SKU" => 555765877,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "S",
                    "SKU" => 894765888,
                ],
                [
                    "productName" => "Example product",
                    "productSize" => "M",
                    "SKU" => 334765899,
                ]
        ];
        return $dummyOrders;
    }
}
