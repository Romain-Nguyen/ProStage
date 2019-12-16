<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      // Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        $nbEntreprise = 10;

        for ($i = 0; $i <= $nbEntreprise; $i++)
        {
          $entreprise = new Entreprise();
          $entreprise -> setNom($faker -> company);
          $entreprise -> setAdresse($faker -> address);
          $entreprise -> setTel($faker -> phoneNumber);
          $entreprise -> setLienSite($faker -> url);
          $manager->persist($entreprise);
        }



        $manager->flush();
    }
}
