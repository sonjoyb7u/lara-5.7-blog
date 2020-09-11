<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NotifyInactiveUsers;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EmailInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending email inactive users for login his account!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $today_to_previous_seven_days = Carbon::now()->subDay(7);
        $today_to_previous_seven_days = Carbon::now();
//        $this->info($today_to_previous_seven_days);

        $inactive_users = User::where('last_login', '<', $today_to_previous_seven_days)->get();
//        $this->info($inactive_users);
        foreach ($inactive_users as $inactive_user) {
            $inactive_user->notify(new NotifyInactiveUsers());
            $this->info('Email send to this address : ' . $inactive_user->email);
        }
    }
}
