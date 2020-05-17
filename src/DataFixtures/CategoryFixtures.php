<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ecologie = new Category();
        $ecologie->setLabel("Ecologie");
        $manager->persist($ecologie);
        $this->addReference("cat-eco",$ecologie);

        $loisir = new Category();
        $loisir->setLabel("Loisir");
        $manager->persist($loisir);
        $this->addReference("cat-loi",$loisir);

        $sante = new Category();
        $sante->setLabel("Santé");
        $manager->persist($sante);
        $this->addReference("cat-sant",$sante);



        $manager->flush();
    }
}
