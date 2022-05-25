<?php

namespace App\Listeners;

use App\Events\AddDownload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveSystemGroupsRelation
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
        $systems = $event->download->systems()->get();
        $systemGroups = [];
        foreach($systems as $system) {
            foreach($system->systemgroups()->get() as $systemGroup) {
                $systemGroups[] = $systemGroup->id;
            }
        }
        $event->download->systemgroups()->sync($systemGroups);
        // dd($systemGroups);
        
    }
}
