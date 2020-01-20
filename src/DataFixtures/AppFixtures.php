<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {

            $product = new Product();
            $product->setTitle("Titre n° " . $i)
                ->setPrice(mt_rand(10, 200))
                ->setImage("https://randomuser.me/api/portraits/men/" . mt_rand(1, 99) . ".jpg");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
