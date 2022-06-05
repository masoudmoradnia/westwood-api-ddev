<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Productlevel extends Model
{
    /**
     * The products that belong to the aplication.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
