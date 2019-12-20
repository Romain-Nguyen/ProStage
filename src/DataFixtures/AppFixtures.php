<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      // Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 10; $i++)
        {
          // Faker pour les stages
          $stage = new Stage();
          $stage -> setTitre($faker -> jobTitle);
          $stage -> setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));
          $stage -> setDateParution($faker -> DateTime($max = 'now'));
          $stage -> setContact($faker -> companyEmail);


          // Faker pour les entreprises
          $entreprise = new Entreprise();
          $entreprise -> setNom($faker -> company);
          $entreprise -> setAdresse($faker -> address);
          $entreprise -> setTel($faker -> phoneNumber);
          $entreprise -> setLienSite($faker -> url);
          $entreprise -> addStage($stage);

          // Faker pour les formations
          $formation = new Formation();
          $formation -> setType($faker->randomElement($array = array ('DUT Informatique', 'DUT GIM', 'DUT GEA', 'Licence Physique/Chimie')));
          $formation -> setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));
          $formation -> addStage($stage);

          $stage -> setEntreprise($entreprise);
          $stage -> addFormation($formation);

          $manager -> persist($entreprise);
          $manager -> persist($stage);
          $manager -> persist($formation);
        }

        $manager->flush();
    }
}
