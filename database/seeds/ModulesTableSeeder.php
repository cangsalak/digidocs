<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('modules')->insert(array(
			'name'=>'Rols',
			'description'=>'ModuleRols',
			'label'=>'{"action":"rol"}'			
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Modules',
			'description'=>'ModuleModules',
			'label'=>'{"action":"module"}'
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Options',
			'description'=>'ModuleOptions',
			'label'=>'{"action":"option"}'
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Users',
			'description'=>'ModuleUsers',
			'label'=>'{"action":"user"}'
			)
		);	
		\DB::table('modules')->insert(array(
			'name'=>'Entities',
			'description'=>'ModuleEntities',
			'label'=>'{"action":"entity"}'
			)
		);
		\DB::table('modules')->insert(array(
			'name'=>'Dependences',
			'description'=>'ModuleDependences',
			'label'=>'{"action":"dependence"}'
			)
		);		
    }
}
