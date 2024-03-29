<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    /**
     * @var Generator 
     */
    private Generator $faker; 

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        //Création de 15 posts
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->setCategorie($this->faker->randomElement(['Alimentation','Grossesse/Accouchement','Sommeil','Santé et bien-être bébé','Développement/Education','Bien-être Maman',]))
                ->setTitre($this->faker->word(mt_rand(1, 3)))
                ->setArticle($this->faker->paragraphs(2, true))
                ->setJourRedaction($this->faker->dateTimeBetween('-5 week', '+1 week'));
            $manager->persist($post);
        }
        $manager->flush();
    }
}
