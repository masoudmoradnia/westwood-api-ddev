<?php

namespace App;

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

    


    // public function scopeWithFilters($query, $categories, $applications, $systems, $products)
    // {
    //     return 
    //     $query->when(count($categories), function ($query) use ($categories) {
    //          $query->whereHas('categories', function ($query) use ($categories) {
    //             $query->whereIn('id', $categories);
    //         });
    //     })

    //     ->when(count($applications), function ($query) use ($applications) {
    //          $query->whereHas('applications', function ($query) use ($applications) {
    //             $query->whereIn('id', $applications);
    //         });
    //     })

    //     ->when(count($systems), function ($query) use ($systems) {
    //          $query->whereHas('systems', function ($query) use ($systems) {
    //             $query->whereIn('id', $systems);
    //         });
    //     })

    //     ->when(count($products), function ($query) use ($products) {
    //          $query->whereHas('products', function ($query) use ($products) {
    //             $query->whereIn('id', $products);
    //         });
    //     });
        
            
    // }

    protected $dispatchesEvents = [
        'created' => AddDownload::class,
        'updated' => AddDownload::class,
    ];
}
