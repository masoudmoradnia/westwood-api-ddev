<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Solution extends Model
{
    use Searchable;
      // search
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
             'id' => $this->id,
             'title' => $this->title,
             'legende' => $this->legende,
            
             
        ];


    }

    /**
     * The systems that belong to the solution.
     */
    public function systems()
    {
        return $this->belongsToMany(System::class);
    }
    /**
     * The product that belong to the solution.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    /**
     * The downloads that belong to the solution.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }
}
