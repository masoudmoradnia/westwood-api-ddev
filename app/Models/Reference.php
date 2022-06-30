<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Application;

class Reference extends Model
{
    use HasFactory;
    use Searchable;
    use Filterable;

    protected $appends = ['applicationids'];
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
        return $this->belongsToMany(Application::class, 'application_reference', 'reference_id', 'application_id');
    }
    public function getApplicationidsAttribute(){
        // return 'test';
        return $this->applications()->pluck('id');
      }
}
