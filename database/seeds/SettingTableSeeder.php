<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
             'description' => "En RYD nos dedicamos a ofrecer productos exquisitos y de alta calidad, cuidadosamente seleccionados para brindar la mejor experiencia a nuestros clientes. Cada producto refleja nuestra pasión por la excelencia y el sabor único que nos caracteriza.",
            'short_des' => "RYD Productos Exquisitos: calidad, sabor y excelencia en cada detalle.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
             'address' => "Quito, Ecuador",
            'email'=>"productosexquryd@gmail.com",
            'phone'=>"0967111483",
        );
        DB::table('settings')->insert($data);
    }
}
