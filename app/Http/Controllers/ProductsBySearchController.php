<?php

namespace App\Http\Controllers;

use App\Models\CollectionProcess;
use App\Models\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ProductsBySearchController extends Controller
{
    public function get(Request $request)
    {
        $process = CollectionProcess::where('query', $request->get('q'))->orderByDesc('created_at')->first();

        if($process === null){
            return [];
        }

        $process->load('products', 'products.sizes', 'products.colors');
        return $process->products;
    }
}
