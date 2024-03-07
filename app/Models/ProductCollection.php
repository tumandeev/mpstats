<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCollection extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $primaryKey = "item_id";
    protected $fillable = [
        "collection_process_id",
        "time1",
        "time2",
        "wh",
        "dtype",
        "dist",
        "id",
        "root",
        "kindId",
        "brand",
        "brandId",
        "siteBrandId",
        "subjectId",
        "subjectParentId",
        "name",
        "supplier",
        "supplierId",
        "supplierRating",
        "supplierFlags",
        "priceU",
        "salePriceU",
        "sale",
        "logisticsCost",
        "returnCost",
        "diffPrice",
        "saleConditions",
        "pics",
        "rating",
        "reviewRating",
        "feedbacks",
        "panelPromoId",
        "promoTextCard",
        "promoTextCat",
        "volume",
        "viewFlags",
        "log",
        "logs",
    ];

    protected $casts = [
        "log" => "array"
    ];

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductColors::class,
            'product_collection_product_colors',
            'product_collection_id',
            'product_colors_id',
            'item_id',
            'id',
        );
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductSizes::class,
            "product_collection_product_sizes",
            "product_collection_item_id",
            "product_sizes_id",
            'item_id',
            'optionId',
        );
    }
    public function log(): HasMany
    {
        return $this->hasMany(ProductLog::class);
    }

}
