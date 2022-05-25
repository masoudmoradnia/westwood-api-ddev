<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;



class Product extends Model
{
    use Searchable;

    protected $with = ['colors','referencesmm'];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
             'id' => $this->id,
             'title' => $this->title,
             'description' => $this->description,
             'subtitle' => $this->subtitle,
             'material' => $this->material,
             'properties' => $this->properties,
             'aricle_number' => $this->aricle_number,             
             'area_of_application' => $this->area_of_application,          

        ];


    }

    /**
     * The producl levels that belong to the product.
     */
    public function productlevel()
    {
        return $this->belongsTo(Productlevel::class);
    }

    /**
     * The solors that belong to the product.
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    /**
     * The refernces that belong to the product.
     */
    public function referencesmm()
    {
        return $this->belongsToMany(Reference::class);
    }
     /**
     * The downloads that belong to the product.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }
   
}
