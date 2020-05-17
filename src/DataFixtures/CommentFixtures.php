<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $com1 = new Comment();
        $com1->setTitle("Super Projet!");
        $com1->setContent("Vivement que se projet débarque !");
        $com1->setProject($this->getReference("proj-1"));
        $com1->setUser($this->getReference("user-lionel"));
        $com1->setCreatedAt(new \DateTime("00:09:00"));
        $manager->persist($com1);

        $this->addReference("com-1",$com1);

        $com2 = new Comment();
        $com2->setTitle("Bof");
        $com2->setContent("Pas interessant");
        $com2->setProject($this->getReference("proj-2"));
        $com2->setUser($this->getReference("user-dupont"));
        $com2->setCreatedAt(new \DateTime("00:19:00"));
        $manager->persist($com2);

        $this->addReference("com-2",$com2);



        $manager->flush();
    }

    public function getDependencies()
    {
       return [
           ProjectFixtures::class,
           UserFixtures::class
       ];
    }
}
