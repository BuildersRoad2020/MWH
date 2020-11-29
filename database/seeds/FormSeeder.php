<?php

use Illuminate\Database\Seeder;
use App\Forms;
class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Forms = [

	['id'=>'1','Doc_Desc'=>'Financial Detail Confirmation','Country'=>'2','Type'=>'Financial', 'Mandatory'=>'1'],
	['id'=>'2','Doc_Desc'=>'Public Liability Insurance','Country'=>'2','Type'=>'Insurance', 'Mandatory'=>'1'],
	['id'=>'3','Doc_Desc'=>'Public Indemnity Insurance','Country'=>'2','Type'=>'Insurance'],
	['id'=>'4','Doc_Desc'=>'SWMS Building, Property and Site Maintenance','Country'=>'2','Type'=>'Safety', 'Mandatory'=>'1'],
	['id'=>'5','Doc_Desc'=>'SWMS Communication Equipment','Country'=>'2','Type'=>'Safety', 'Mandatory'=>'1'],
	['id'=>'6','Doc_Desc'=>'New South Wales Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'7','Doc_Desc'=>'Australian Capital Territory Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'8','Doc_Desc'=>'Northern Territory Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'9','Doc_Desc'=>'New Zealand Work Area Coverage','Country'=>'3','Type'=>'Work Area'],
	['id'=>'10','Doc_Desc'=>'Queensland Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'11','Doc_Desc'=>'South Australia Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'12','Doc_Desc'=>'Tasmania Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'13','Doc_Desc'=>'Victoria Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'14','Doc_Desc'=>'Western Australia Work Area Coverage','Country'=>'2','Type'=>'Work Area'],
	['id'=>'15','Doc_Desc'=>'Third Party Accreditation','Country'=>'2','Type'=>'Others'],
	['id'=>'16','Doc_Desc'=>'New South Wales Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'17','Doc_Desc'=>'Australian Capital Territory Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'18','Doc_Desc'=>'Northern Territory Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'19','Doc_Desc'=>'New Zealand Electrical Certification','Country'=>'3','Type'=>'Technical'],
	['id'=>'20','Doc_Desc'=>'Queensland Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'21','Doc_Desc'=>'South Australia Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'22','Doc_Desc'=>'Tasmania Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'23','Doc_Desc'=>'Victoria Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'24','Doc_Desc'=>'Western Australia Electrical Certification','Country'=>'2','Type'=>'Technical'],
	['id'=>'25','Doc_Desc'=>'ATO Security Clearance','Country'=>'2','Type'=>'Individual'],
	['id'=>'26','Doc_Desc'=>'Police Checks','Country'=>'2','Type'=>'Individual'],
	['id'=>'27','Doc_Desc'=>'State Induction Cards','Country'=>'2','Type'=>'Individual'],
	['id'=>'28','Doc_Desc'=>'Working With Children Cards','Country'=>'2','Type'=>'Individual'],
	['id'=>'29','Doc_Desc'=>'WPCG Certificate','Country'=>'2','Type'=>'Individual'],
	['id'=>'30','Doc_Desc'=>'Terms and Conditions','Country'=>'2','Type'=>'Agreement'],
	['id'=>'31','Doc_Desc'=>'Non Disclosure Agreement','Country'=>'2','Type'=>'Agreement', 'Mandatory'=>'1'],

        ];

        foreach($Forms as $Form) {
        Forms::create($Form);
        }        
    }
}
