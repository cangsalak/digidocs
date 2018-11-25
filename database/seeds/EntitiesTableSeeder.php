<?php

use Illuminate\Database\Seeder;

class EntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('entities')->insert(array(
        	'nit'=>'82345698-2',
			'name'=>'Super-Administrador',
			'department'=>'superAdmin',
			'city'=>'city',
			'adress'=>'Cr 1 #1 -101',
			'phone1' => '45634567',
			'phone2' => '45634562',
			'phone3' => '45634563',
			'email_institutional' => 'email@institutional.com',
			'description' => 'description',
			'slogan' => 'Institutional Slogan',
			'scutcheon1' => 'scutcheon1.png',
			'scutcheon2' => 'scutcheon2.png',
			'label'=>'{}'			
			)
		);		
    }
}
