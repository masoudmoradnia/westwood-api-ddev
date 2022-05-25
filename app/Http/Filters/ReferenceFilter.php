<?php

namespace App\Http\Filters;

use App\Reference;
use App\System;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
 
class ReferenceFilter extends Filter
{
    /**
     * Filter the references by the given applications.
     *
     * @param  array|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applications(array $value = null): Builder
    {
        return $this->builder->whereHas('applications' , function(Builder $query) use($value){
            $query->whereIn('id' , $value);
        }); 
    }

    /**
     * Filter the references by the given applications.
     *
     * @param  array|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function groups(array $value = null): Builder
    {
        
        return $this->builder->whereHas('systemgroups' , function(Builder $query) use($value){
            $query->whereIn('id' , $value);
        }); 
        
        // // first find all systems that belong to queried systemgroups
        // $systems = System::whereHas('systemgroups', function ($query) use ($value) {            
        //     $query->whereIn('id', $value);
        // }) -> get() -> pluck('id');
        
        // // now filter with systems
        // return $this->builder->whereHas('systems' , function(Builder $query) use ($systems){
        //     $query->whereIn('id' , $systems);
        // }); ;
    }
}
