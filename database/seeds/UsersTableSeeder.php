<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
			'name'=>'super',
			'surname'=>'super',			
			'email'=>'super@yopmail.com',
			'phone'=>'3194062550',
			'password'=>\Hash::make('0000'),			
			'rol_id'=>1,
			'acount_id'=>3,
			'rel_entity_id'=>0
			)
		);
		\DB::table('users')->insert(array(
			'name'=>'admin',
			'surname'=>'admin',
			'email'=>'admin@yopmail.com',
			'phone'=>'3113333333',
			'password'=>\Hash::make('0000'),						
			'rol_id'=>2,
			'acount_id'=>1,
			'rel_entity_id'=>1
			)
		);

		\DB::table('users')->insert(array(
			'name'=>'representante',
			'surname'=>'legal',
			'email'=>'agente@yopmail.com',
			'phone'=>'31122222222',
			'password'=>\Hash::make('0000'),						
			'rol_id'=>3,
			'acount_id'=>1,
			'rel_entity_id'=>1
			)
		);
    }
}
