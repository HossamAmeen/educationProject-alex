<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RevokeExistingTokens
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $user = \App\Models\Student::find($event->userId);
        // // ->offset(1)
        // $user->tokens()->limit(1)->get()->map(function ($token) {
        // $token->revoke();
        // });
    }
}
