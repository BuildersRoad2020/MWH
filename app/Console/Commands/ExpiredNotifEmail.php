<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Document;
use App\Contractor;
use App\User;
use App\Forms;
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
        $today = Carbon::now(); // current date
        $users = Document::whereDate('Expiration', '<', $today)->get(); // get all data 
        foreach ($users as $user) {
            $contractors = Contractor::where('user_id', $user->contractor_id)->first();
            $Expiration = $user->Expiration;
            $Document = $user->FormID;
            $name = $contractors->contractor_name;
            $Form = Forms::where('id', $Document)->first();
            $doc = $Form->Doc_Desc;

            $datetocompare = Carbon::parse($Expiration)->addDays(1);

            if ($today = $datetocompare) {

                $email =  $contractors->email_primary;
                $contractor_id = $contractors->user_id;
                Document::where('FormID', $user->FormID)->where(['contractor_id' => $contractor_id,])->update(['Status' => 5]);
                Contractor::where(['user_id' => $contractor_id])->update(['Status' => 0]);

                $details2 = [
                    'name' => 'Dear ' . $name,
                    'body' =>  'Your ' . $doc . ' document has already expired last ' . $Expiration,
                    'body2' => 'Please Renew this document.',
                ];
                \Mail::to($email)->send(new documentexpiry($details2));
            }
        }
    }
}
