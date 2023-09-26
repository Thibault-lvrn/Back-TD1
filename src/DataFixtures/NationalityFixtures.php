<?php

namespace App\DataFixtures;

use App\Entity\Nationality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Génére moi 5 objets Category fictifs

        foreach (range(1, 10) as $i) {
            $nationality = new Nationality();
            $nationality->setTitle('Nationality_' . $i);
            $manager->persist($nationality);
            $this->setReference('Nationality_' . $i, $nationality); // "expose" l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }

        $manager->flush();
    }
}