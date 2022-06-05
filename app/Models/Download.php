<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\AddDownload;
use App\Traits\Filterable;



class Download extends Model
{
    // protected $with = ['categories'];
    use Filterable;

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'download_category');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function productlevels()
    {
        return $this->belongsToMany(Productlevel::class);
    }
    public function systems()
    {
        return $this->belongsToMany(System::class);
    }
    public function systemgroups()
    {
        return $this->belongsToMany(Systemgroup::class);
    }
    public function applications()
    {
        return $this->belongsToMany(Application::class);
    }

    


  
    protected $dispatchesEvents = [
        'created' => AddDownload::class,
        'updated' => AddDownload::class,
    ];
}
