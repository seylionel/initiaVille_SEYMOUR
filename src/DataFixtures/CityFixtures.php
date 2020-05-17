<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $laval = new City();
        $laval->setName('Laval');
        $laval->setPicture('laval.jpg');
        $manager->persist($laval);

        $this->addReference('city-la',$laval);


        $rennes = new City();
        $rennes->setName('Rennes');
        $rennes->setPicture('rennes.jpg');
        $manager->persist($rennes);

        $this->addReference('city-re',$rennes);

        $stmalo = new City();
        $stmalo->setName('St-Malo');
        $stmalo->setPicture('st-malo.jpg');
        $manager->persist($stmalo);

        $this->addReference('city-st',$stmalo);

        $vannes = new City();
        $vannes->setName('Vannes');
        $vannes->setPicture('vannes.jpg');
        $manager->persist($vannes);

        $this->addReference('city-va',$vannes);

        $manager->flush();
    }
}

