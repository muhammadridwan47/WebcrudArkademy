<?php namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {

                $faker = \Faker\Factory::create(); // data acak dari berbagai negara
                
		$faker = \Faker\Factory::create('ja_JP');// data acak dari negara jepang

                for ($i=1; $i < 1000; $i++) { 
                       
                        $data = [
                                'name' => $faker->name,
                                'alamat'    => $faker->address,
                                'created_at'    => Time::now(),
                                'updated_at'    => Time::now()
                        ];
                        $this->db->table('orang')->insert($data);
                }

                // Simple Queries
                // $this->db->query("INSERT INTO orang (name, alamat) VALUES(:name:, :alamat:)",
                //         $data
                // );

                // Using Query Builder
                
        }
}