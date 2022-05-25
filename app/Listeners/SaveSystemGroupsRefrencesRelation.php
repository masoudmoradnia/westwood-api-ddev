<?php

namespace App\Listeners;

use App\Events\AddSytemGroupRelationToReferences;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveSystemGroupsRefrencesRelation
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
     * @param  AddSytemGroupRelationToReferences  $event
     * @return void
     */
    public function handle(AddSytemGroupRelationToReferences $event)
    {
        $systems = $event->reference->systems()->get();
        $systemGroups = [];
        foreach ($systems as $system) {
            foreach ($system->systemgroups()->get() as $systemGroup) {
                $systemGroups[] = $systemGroup->id;
            }
        }
        $event->reference->systemgroups()->sync($systemGroups);

    }
}
