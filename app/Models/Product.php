<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
   

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
