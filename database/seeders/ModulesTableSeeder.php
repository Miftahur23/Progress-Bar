<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
          $module=  Module::firstOrCreate([

               'name'=>'Category',
            ]);

            //Volunteers permission
            $events=['show.category','create.category','store.category','view.category','edit.category','update.category','delete.category'];
            
            foreach( $events as $permission )
            {
                Permission::firstOrCreate([
                    'module_id'=>$module->id,
                    'name'=>$permission,
                    'slug'=>Str::slug($permission)
                ]);
            }

        }

    }

