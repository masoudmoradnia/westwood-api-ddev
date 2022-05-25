<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Application extends Model
{
    use HasFactory;
    use Searchable;


    // search
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
             'id' => $this->id,
             'title' => $this->title,
             'description' => $this->description,
             'highligts' => $this->highligts,
             'highlights_title' => $this->highlights_title,
             
        ];
    }
    protected $with = ['referencesmm', 'systems', 'downloads','products'];

    /**
     * The refernces that belong to the application.
     */
    public function referencesmm()
    {
        return $this->belongsToMany(Reference::class);
    }
    /**
     * The systems that belong to the application.
     */
    public function systems()
    {
        return $this->belongsToMany(System::class);
    }
    /**
     * The downloads that belong to the application.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }
    /**
     * The product that belong to the application.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
