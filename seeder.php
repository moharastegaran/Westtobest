<?php

require_once "vendor/autoload.php";


class seeder extends \Faker\Factory{

    private $faker;
    private $sicks;
    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
        $this->sicks = ['AIDS','Cancer','Deaf','physical_disability','Trans','short'];
    }


    public function getusername(){
        $country = $this->faker->country;

        return [
            'name' => $this->faker->name,
            'birthday' => $this->faker->dateTimeBetween('-55 years', '-8 years'),
            'username' => $this->faker->userName,
            'mail' => $this->faker->email,
            'password' => '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', // 11111111
            'bio' => $this->faker->text(200),
            'sickness' => $this->sicks[rand(0,count($this->sicks))],
            'avatar' => 'photo'.rand(0,10).'.jpg'
        ];
    }

    public function run(){
        include "config/config.php";
        global $conn;

        $sql = array();
        foreach(range(0,100) as $i){
//            $username = $this->getusername();
            $sql[] = '("'.$this->faker->name.'", "'.$this->faker->date().'"
            , "'.$this->faker->userName.'","'.$this->faker->email.'", "$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja"
            , "this is my bio", "'.$this->sicks[rand(0,count($this->sicks)-1)].'", "photo'.rand(0,10).'.jpg")';
        }
        $sql = implode(',', $sql);

        $conn->query('INSERT INTO user (name,birthday,username,mail,password,bio,sickness,avatar) VALUES '. $sql);
    }

}

?>
