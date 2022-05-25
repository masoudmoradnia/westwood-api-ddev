<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Productlevel extends Model
{
    use Searchable;

    protected $with = ['products'];

      // search
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
             'id' => $this->id,
             'title' => $this->title,
             'subtitle' => $this->subtitle,
             'description' => $this->description,
             
        ];


    }


    /**
     * The products that belong to the aplication.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
