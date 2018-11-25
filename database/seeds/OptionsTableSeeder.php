<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Modulo Modulo
        \DB::table('options')->insert(array(
			'name'=>'index',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-list"}',
			'module_id'=>1			
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'show',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-list"}',
			'module_id'=>1	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'create',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-plus"}',
			'module_id'=>1	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'store',			
			'label'=>'{"menu":"page","method":"post","icon":"fas fa-plus"}',
			'module_id'=>1	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'edit',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-gears"}',
			'module_id'=>1	
			)
		);	
		\DB::table('options')->insert(array(
			'name'=>'update',			
			'label'=>'{"menu":"page","method":"put","icon":"fas fa-gears"}',
			'module_id'=>1	
			)
		);	
		\DB::table('options')->insert(array(
			'name'=>'destroy',			
			'label'=>'{"menu":"page","method":"delete","icon":"fas fa-times"}',
			'module_id'=>1	
			)
		);

		//Modulo Opciones
		\DB::table('options')->insert(array(
			'name'=>'index',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-list"}',
			'module_id'=>2			
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'show',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-list"}',
			'module_id'=>2	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'create',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-plus"}',
			'module_id'=>2	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'store',			
			'label'=>'{"menu":"page","method":"post","icon":"fas fa-plus"}',
			'module_id'=>2	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'edit',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-gears"}',
			'module_id'=>2	
			)
		);	
		\DB::table('options')->insert(array(
			'name'=>'update',			
			'label'=>'{"menu":"page","method":"put","icon":"fas fa-gears"}',
			'module_id'=>2	
			)
		);	
		\DB::table('options')->insert(array(
			'name'=>'destroy',			
			'label'=>'{"menu":"page","method":"delete","icon":"fas fa-times"}',
			'module_id'=>2	
			)
		);


		//Modulo Entidades opt 15
		\DB::table('options')->insert(array(
			'name'=>'index',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-list"}',
			'module_id'=>5			
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'show',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-list"}',
			'module_id'=>5	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'create',			
			'label'=>'{"menu":"top","method":"get","icon":"fas fa-plus"}',
			'module_id'=>5	
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'store',			
			'label'=>'{"menu":"page","method":"post","icon":"fas fa-plus"}',
			'module_id'=>5
			)
		);
		\DB::table('options')->insert(array(
			'name'=>'edit',			
			'label'=>'{"menu":"page","method":"get","icon":"fas fa-gears"}',
			'module_id'=>5
			)
		);	
		\DB::table('options')->insert(array(
			'name'=>'update',			
			'label'=>'{"menu":"page","method":"put","icon":"fas fa-gears"}',
			'module_id'=>5
			)
		);	
		\DB::table('options')->insert(array(
			'name'=>'destroy',			
			'label'=>'{"menu":"page","method":"delete","icon":"fas fa-times"}',
			'module_id'=>5
			)
		);


    }
}
