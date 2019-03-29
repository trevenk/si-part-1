<?php

namespace App\DataFixtures;

use App\Entity\TipoArticulo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TipoArticuloFixture extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $tipoarticulo = new TipoArticulo();
        $tipoarticulo -> setNombre('barra');

        $manager->persist($tipoarticulo);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1', 'group2'];
    }
}
