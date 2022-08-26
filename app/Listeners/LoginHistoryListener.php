<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\LoginHistory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginHistoryListener
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
    public function handle(LoginHistory $event)
    {  
        $user = $event->user;
        $current_timestamp = Carbon::now()->toDateTimeString();
      $insert =  DB::table('login_histories')->insert([
        'name'=>$user->name,
        'email'=>$user->email,
        'created_at'=>$current_timestamp,
        'updated_at'=>$current_timestamp
       ]);

       return $insert;
    }
}
