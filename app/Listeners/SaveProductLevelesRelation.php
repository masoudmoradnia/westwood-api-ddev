<?php

namespace App\Listeners;

use App\Events\AddDownload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Product;

class SaveProductLevelesRelation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddDownload  $event
     * @return void
     */
    public function handle(AddDownload $event)
    {
        $dl = $event->download;
        $productLevels = [];
        foreach($dl->products()->get() as $product) {
            
            $productLevels[] = $product->productlevel->id;
        }
        $dl->productLevels()->sync($productLevels);
        
    }
}
