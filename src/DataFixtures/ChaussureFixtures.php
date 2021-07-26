<?php

namespace App\DataFixtures;

use App\Entity\Chaussure;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChaussureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1; $i<20; $i++){
            $chaussure = new Chaussure();
            $chaussure->setName("SuperChaussures".$i);
            $chaussure->setBrand("ecoPied".$i);
            $chaussure->setDescription("les chaussures super ecologiques".$i);
            $manager->persist($chaussure);
        }

        $manager->flush();
    }
}
