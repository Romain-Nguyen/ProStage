<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entreprise = new Entreprise();
        $entreprise -> setNom("Quiksilver");
        $entreprise -> setAdresse("7 ESPLANADE DE L'EUROPE");
        $entreprise -> setTel("0559266791");
        $entreprise -> setLienSite("https://www.quiksilver.fr/");

        $manager->persist($entreprise);
        $manager->flush();
    }
}
