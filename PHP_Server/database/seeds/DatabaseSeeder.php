<?php

use Illuminate\Database\Seeder;

use App\Shopping_cart;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB::connection('mysql_2')->table('Shopping_cart')->all();

        // $this->call(UsersTableSeeder::class);
        DB::connection('mysql_2')->table('Shopping_cart')->delete();
        
        DB::table('Statut')->insert(
            ['statut_name' => 'test']
        );

        $stat = App\Statut::all();

        foreach ($stat as $state) {
            echo $state->statut_name;
        }

        //$a = DB::table('Statut')->select::all();

       // var_dump($a);

        //DB::connection('mysql_2')->table('Shopping_cart')->all();
    }
}
