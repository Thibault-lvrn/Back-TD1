<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [ActorFixtures::class];
    }
    public function load(ObjectManager $manager): void
    {
        // Génère 40 films avec un titre, une date de sortie, une durée, un synopsis, une catégorie (en lien avec les autres fixtures) et entre 2 et 4 acteurs, diffé (en lien avec les autres fixtures)
        // tableau php de 40 nom de films :
        $Films = ['Le Parrain', 'Le Seigneur des anneaux', 'Pulp Fiction', 'La Ligne verte', 'Forrest Gump', 'Le Roi Lion', 'Gladiator', 'Le Silence des agneaux', 'Fight Club', 'Seven', 'Inception', 'Le Prestige', 'Interstellar', 'Django Unchained', 'Le Loup de Wall Street', 'Le Hobbit', 'Le Hobbit 2', 'Le Hobbit 3', 'Le Seigneur des anneaux', 'Le Seigneur des anneaux 2', 'Le Seigneur des anneaux 3', 'Le Parrain 2', 'Le Parrain 3', 'Pulp Fiction 2', 'Pulp Fiction 3', 'La Ligne verte 2', 'La Ligne verte 3', 'Forrest Gump 2', 'Forrest Gump 3', 'Le Roi Lion 2', 'Le Roi Lion 3', 'Gladiator 2', 'Gladiator 3', 'Le Silence des agneaux 2', 'Le Silence des agneaux 3', 'Fight Club 2', 'Fight Club 3', 'Seven 2', 'Seven 3', 'Inception 2', 'Inception 3', 'Le Prestige 2', 'Le Prestige 3', 'Interstellar 2', 'Interstellar 3', 'Django Unchained 2', 'Django Unchained 3', 'Le Loup de Wall Street 2', 'Le Loup de Wall Street 3'];

        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            $movie->setTitle($Films[$i]);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration(rand(60, 180));
            $movie->setDescription('Synopsis ' . $i);
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
//            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
//            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
//            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
//            $movie->addActor($this->getReference('actor_' . rand(1, 10)));

            // Ajoute entre 2 et 6 acteurs dans le films, tous différents en se basant sur les fixtures
            $actors = [];
            foreach (range(1, rand(2, 6)) as $j) {
                $actor = $this->getReference('actor_' . rand(1, 10));
                if (!in_array($actor, $actors)) {
                    $actors[] = $actor;
                    $movie->addActor($actor);
                }
            }

            $manager->persist($movie);
        }

        $manager->flush();
    }
}