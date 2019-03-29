<?php

namespace App\DataFixtures;

use App\Entity\Alergenos;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AlergenosFixture extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $alergeno = new Alergenos();
        $alergeno->setNombre('Apio');
        $alergeno->setIcon('../../images/alergenos/apio.png');
        $manager->persist($alergeno);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1', 'group2'];
    }
}
