<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Document;
use App\Contractor;
use App\Forms;
use \App\Mail\DocumentExpiry;


class NotifEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commands:sendnotification30days'; //About to expire Contractor Document Notification

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Send Expiration Notification before 30 days';

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
        $today = Carbon::now(); // current date
        $users = Document::whereDate('Expiration', '>', $today)->get(); // get all data       
        foreach ($users as $user) {
            $contractors = Contractor::where('user_id', $user->contractor_id)->first();
            $Expiration = $user->Expiration;
            $Document = $user->FormID;
            $name = $contractors->contractor_name;
            $current = date("Y-m-d");
            $Form = Forms::where('id', $Document)->first();
            $doc = $Form->Doc_Desc;

            $date = date_create($Expiration);
            date_sub($date, date_interval_create_from_date_string("30 days"));
            $datetocompare = date_format($date, "Y-m-d");

            if ($current == $datetocompare) {
                $email =  $contractors->email_primary;
                $contractor_id = $contractors->user_id;
                Document::where('FormID', $user->FormID)->where(['contractor_id' => $contractor_id,])->update(['Status' => 4]);

                $details2 = [
                    'name' => 'Dear ' . $name,
                    'body' =>  'Your ' . $doc . ' will expire this ' . $Expiration,
                    'body2' => 'Please Renew Before Document Expires',
                ];
                \Mail::to($email)->send(new documentexpiry($details2));
            }
        }
    }
}
