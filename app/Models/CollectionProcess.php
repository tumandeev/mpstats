<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        "query"
    ];

    public function products()
    {
        return $this->hasMany(ProductCollection::class);
    }
}
