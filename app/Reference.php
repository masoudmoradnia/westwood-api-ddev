<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Reference extends Model
{
    use HasFactory;
    use Searchable;
    use Filterable;

    protected $with = ['downloads','applications'];

    // search
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return [
             'id' => $this->id,
             'title' => $this->title,
             'description' => $this->description,
             'address' => $this->address,
             'processor' => $this->processor,
             'Date' => $this->Date,
             
        ];
    }


    /**
    * The downloads that belong to the reference.
    */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }

    /**
     * The systems that belong to the reference.
     */
    public function systems()
    {
        return $this->belongsToMany(System::class);
    }
    /**
     * The systemgroups that belong to the reference.
     */

    public function systemgroups()
    {
        return $this->belongsToMany(Systemgroup::class);
    }

    /**
     * The applications that belong to the reference.
     */
    public function applications()
    {
        return $this->belongsToMany(Applicationstandalone::class, 'application_reference', 'reference_id', 'application_id');
    }
}
