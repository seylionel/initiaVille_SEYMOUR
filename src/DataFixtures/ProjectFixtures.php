<?php

namespace App\DataFixtures;


use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $projet1 = new Project();
        $projet1->setTitle("Boîte à lire");
        $projet1->setPicture("boite-a-lire.jpg");
        $projet1->setCost("3000");
        $projet1->setDescription("Permettre l'échange de livre entre particuliers.");
        $projet1->setExcerpt("Voir plus");

        $projet1->setUser($this->getReference("user-lionel"));
        $projet1->setCity($this->getReference("city-re"));
        $projet1->addCategory($this->getReference("cat-loi"));
        $manager->persist($projet1);
        $this->addReference("proj-1",$projet1);

        $projet2 = new Project();
        $projet2->setTitle("Potager sur les toits");
        $projet2->setPicture("potager-toit.jpg");
        $projet2->setCost("75000");
        $projet2->setDescription("Aménager des potagers sur les toits de la ville.");
        $projet2->setExcerpt("Voir plus");

        $projet2->setUser($this->getReference("user-dupont"));
        $projet2->setCity($this->getReference("city-re"));
        $projet2->addCategory($this->getReference("cat-eco"));
        $manager->persist($projet2);
        $this->addReference("proj-2",$projet2);

        $projet3 = new Project();
        $projet3->setTitle("Cinéma en plein air");
        $projet3->setPicture("cinema-plein-air.jpg");
        $projet3->setCost("25000");
        $projet3->setDescription("Proposer des séances de cinéma en plein 2 soirs par semaine.");
        $projet3->setExcerpt("Voir plus");
        $projet3->setUser($this->getReference("user-lionel"));
        $projet3->setCity($this->getReference("city-st"));
        $projet3->addCategory($this->getReference("cat-sant"));
        $manager->persist($projet3);
        $this->addReference("proj-3",$projet3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [CityFixtures::class,UserFixtures::class,CategoryFixtures::class];
    }

}
