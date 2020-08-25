<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('admin')->delete();
        $adminsRecord=[
            [
                'ID'=>1,'name'=>'admin','email'=>'email@email.com',
                'password'=>bcrypt('123456789'),
            ],

        ];
        foreach ($adminsRecord as $key=> $record){
            \App\Models\Admin::create( $record);
        }
    }
}
