<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Document;
use App\Contractor;
use App\User;
use \App\Mail\DocumentExpiry;


class ExpiredNotifEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commands:sendnotificationexpired';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Send Expired Emails';

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
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now();// current date

        $users = Document::whereDate('Expiration', '<', $today)->get(); // get all data 
        foreach ($users as $user) {
            $contractors = Contractor::where('user_id', $user->contractor_id)->first();
            $Expiration = $user->Expiration; 
            $Document = $user->Type;     
            $name = $contractors->contractor_name;
            $current =date("Y-m-d");
            $date=date_create($Expiration);
            date_sub($date,date_interval_create_from_date_string("7 days"));
            $date323 = date_format($date,"Y-m-d");
        if($current > $date323)
        {
            $email =  $contractors->email_primary;
            $contractor_id = $contractors->user_id;
            Document::where(['contractor_id' => $contractor_id,])
            -> update(['Status' => 5]);
            Contractor::where(['user_id' => $contractor_id,])
            -> update(['Status' => 0]);

        $details2 = [   
            'name'=> 'Dear '.$name,
            'body' =>  'Your ' .$Document. ' has expired on '.$Expiration,
            'body2' => 'Please Upload Another Document' ,
  
        ];
        \Mail::to($email)->send(new documentexpiry($details2));
        }


        
        }
    }

}
