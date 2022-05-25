<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class System extends Model
{
    use Searchable;

    protected $with = ['downloads', 'referencesmm', 'products'];

    // search
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
             'id' => $this->id,
             'title' => $this->title,
             'subtitle' => $this->subtitle,
             'description' => $this->description,
             'properties' => $this->properties,
             'Application' => $this->Application,
             'properties' => $this->properties,
             
        ];
    }

    /**
     * The downloads that belong to the system.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }
    /**
     * The refernces that belong to the system.
     */
    public function referencesmm()
    {
        return $this->belongsToMany(Reference::class);
    }
    
    /**
    * The Products that belong to the system.
    */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * The groups that belong to the system.
     */
    public function systemgroups()
    {
        return $this->belongsToMany(Systemgroup::class);
    }
}
