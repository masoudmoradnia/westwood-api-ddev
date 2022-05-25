<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
 
class DownloadFilter extends Filter
{

    /**
     * Filter the Downloads by the given categories.
     *
     * @param  array|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function categories(array $value = null): Builder
    {
        return $this->builder->whereHas('categories', function (Builder $query) use ($value) {
            $query->whereIn('id', $value);
        });
    }
    /**
     * Filter the downloads by the given applications.
     *
     * @param  array|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applications(array $value = null): Builder
    {
        return $this->builder->whereHas('applications', function (Builder $query) use ($value) {
            $query->whereIn('id', $value);
        });
    }

    /**
     * Filter the downloads by the given systemgroups.
     *
     * @param  array|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function systemgroups(array $value = null): Builder
    {
        return $this->builder->whereHas('systemgroups', function (Builder $query) use ($value) {
            $query->whereIn('id', $value);
        });        
       
    }

    /**
     * Filter the downloads by the given productlevels.
     *
     * @param  array|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function productLevels(array $value = null): Builder
    {
        return $this->builder->whereHas('productlevels', function (Builder $query) use ($value) {
            $query->whereIn('id', $value);
        });        
       
    }
}
