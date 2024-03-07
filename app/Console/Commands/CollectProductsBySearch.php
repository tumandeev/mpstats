<?php

namespace App\Console\Commands;

use App\Models\CollectionProcess;
use App\Models\ProductCollection;
use App\Models\ProductColors;
use App\Models\ProductSizes;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CollectProductsBySearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:collect-products-by-search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collects product items by keyword';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = "https://search.wb.ru/exactmatch/ru/common/v4/search";

        $words = [
            "джинсы",
            "платье",
            "футболка",
        ];

        $params = [
            "ab_testing" => "false",
            "appType" => 1,
            "curr" => "rub",
            "dest" => "-1257786",
            "resultset" => "catalog",
            "sort" => "popular",
            "spp" => "30",
            "suppressSpellcheck" => "false",
        ];

        foreach ($words as $word){
            $params["query"] = $word;
            do{
                $result = Http::get($url, $params)->json();
            }
            while ($result['params']['dest'] != $params['dest']);



            $processCollection = CollectionProcess::create([
                "query" => $params["query"]
            ]);

            foreach ($result['data']['products'] as $product){
                $colors = [];
                foreach ($product['colors'] as $color){
                    $colors[] = $color['id'];
                    ProductColors::updateOrCreate($color);
                }
                $sizes = [];
                foreach ($product['sizes'] as $size){
                    $optionId =  $size['optionId'];
                    unset($size['optionId']);
                    $sizes[] = ProductSizes::updateOrCreate(
                        ["optionId" => $optionId],
                        $size
                    )->getKey();
                }


                $product['collection_process_id'] = $processCollection->getKey();

                $productModel = ProductCollection::create($product);


                $productModel->sizes()->attach($sizes);
                $productModel->colors()->attach($colors);
            }
        }


    }
}
