<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{



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
