<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicationstandalone extends Model
{
    use HasFactory;
    protected $table = 'applications';

    public function referencesmm()
    {
        return $this->belongsToMany(Reference::class , 'application_reference' , 'application_id' , 'reference_id' );
    }
    public function solutions()
    {
        return $this->belongsToMany(Solution::class, 'application_solution' , 'application_id' , 'solution_id');
    }

    /**
     * The downloads that belong to the application.
     */
    public function downloads()
    {
        return $this->belongsToMany(Download::class, 'application_download' , 'application_id' , 'download_id');
    }
}
