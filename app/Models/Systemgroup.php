<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Systemgroup extends Model
{
    // use Searchable;

    // protected $with = ['systems'];

      // search
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     return [
    //          'id' => $this->id,
    //          'title' => $this->title,
    //          'description' => $this->description,             
             
    //     ];


    // }
    
    /**
     * The systems that belong to the group.
     */
    public function systems()
    {
        return $this->belongsToMany(System::class);
    }
    /**
     * The downloads that belong to the Systemgroup.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }
}
