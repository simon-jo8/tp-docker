<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitre("Titre de l'article n°$i");
            $manager->persist($article);
        }
        $manager->flush();
    }
}
