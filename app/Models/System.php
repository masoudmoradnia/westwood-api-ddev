<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{

    protected $appends = ['systemgroups'];

    /**
     * The downloads that belong to the system.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }

    /**
     * The Applications that belong to the system.
     */
    public function Applications()
    {
        return $this->belongsToMany(Application::class);
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
    public function getSystemgroupsAttribute(){
        // return 'test';
        return $this->systemgroups()->pluck('id');
      }
}
