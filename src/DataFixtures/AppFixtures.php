<?php

namespace App\DataFixtures;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {   
        //Se creo el usuario cajero
        $user = new User();
        $user->setUsername('cajero');
        $user->setPassword(
            $this->encoder->encodePassword($user, 'cajero123')
        );
        $user->setRole('ROLE_CAJERO');
        $user->setEmail('themike123work@gmail.com');
        $manager->persist($user);        

        //Se creo el usuario supervisor
        $user = new User(); 
        $user->setUsername('supervisor');
        $user->setPassword(
            $this->encoder->encodePassword($user, 'supervisor123')
        );
        $user->setRole('ROLE_SUPERVISOR');
        $user->setEmail('themike123work@gmail.com');
        $manager->persist($user);        

        //Se creo el usuario admin
        $user = new User(); 
        $user->setUsername('admin');
        $user->setPassword(
            $this->encoder->encodePassword($user, 'admin123')
        );
        $user->setRole('ROLE_ADMIN');
        $user->setEmail('themike123work@gmail.com');
        $manager->persist($user);


        $manager->flush();
    }
}
