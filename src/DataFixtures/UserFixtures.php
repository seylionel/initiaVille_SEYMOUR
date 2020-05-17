<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname("lionel");
        $admin->setLastname("seymour");
        $admin->setEmail("lionel@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "lionel"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        $this->addReference("user-lionel", $admin);

        $user = new User();
        $user->setFirstname("jean");
        $user->setLastname("dupont");
        $user->setEmail("jdupont@hotmail.com");
        $user->setPassword($this->encoder->encodePassword($user, "dupont"));
        $manager->persist($user);
        $this->addReference("user-dupont", $user);

        $manager->flush();
    }


}
