<?php

use Illuminate\Database\Seeder;
use App\TypeForm;

class Form_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Type = [

            ['id'=>'1', 'Type' => 'Agreement'],
            ['id'=>'2', 'Type' => 'Financial'],
            ['id'=>'3', 'Type' => 'Individual'],   
            ['id'=>'4', 'Type' => 'Insurance'],   
            ['id'=>'5', 'Type' => 'Others'], 
            ['id'=>'6', 'Type' => 'Safety'],  
            ['id'=>'7', 'Type' => 'Technicial'],  
            ['id'=>'8', 'Type' => 'Work Area'],                                                             
        ];

        foreach($Type as $Types) {
            TypeForm::create($Types);
            }
    }
}
