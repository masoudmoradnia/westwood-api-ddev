<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    /**
     * The downloads that belong to the category.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class , 'download_category');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
}
