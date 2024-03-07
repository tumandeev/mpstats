<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizes extends Model
{

    protected $primaryKey = "optionId";
    public $timestamps = false;
    protected $fillable = [
        "name",
        "origName",
        "rank",
        "optionId",
        "wh",
        "dtype",
        "returnCost",
        "priceU",
        "salePriceU",
        "sale",
        "logisticsCost",
        "sign",
        "payload",
    ];

    use HasFactory;
}
