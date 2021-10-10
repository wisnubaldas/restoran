<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;

class MenuController extends BaseController
{
    public function all_menu()
    {
        return $this->sendResponse(Product::all(), 'all makanan & minuman product');
    }
}
