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
			'name'=>'Super-Administrador',
			'department'=>'superAdmin',
			'city'=>'city',
			'adress'=>'adress',
			'description'=>'description',
			'adress'=>'adress',			
			)
		);
		\DB::table('entities')->insert(array(
			'name'=>'Administrador',
			'description'=>'admin',
			'label'=>'{"options":["editProfile","editStore","paswordChange","acountSummary","sendSuggestions","termsConditions"]}'
			)
		);
		\DB::table('entities')->insert(array(
			'name'=>'Agente',
			'description'=>'adminMeans',
			'label'=>'{"options":["editProfile","paswordChange","acountSummary","sendSuggestions","termsConditions"]}'
			)
		);
    }
}
