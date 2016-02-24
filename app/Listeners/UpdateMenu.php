<?php

namespace App\Listeners;

use App\Events\MenuSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateMenu
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
     * @param  MenuSaved  $event
     * @return void
     */
    public function handle(MenuSaved $event)
    {
        //
    }
}
