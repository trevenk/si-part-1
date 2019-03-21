<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Area;

class AreaController extends AbstractController
{
    /**
     * @Route("/roles/admin/area", name="new-area")
     */
    public function newArea()
    {
        // traer el entity manager
        $entityManager = $this->getDoctrine()->getManager();

        // construir e inicializar un area
        $area = new Area();
        $area->setNombre('piscina');
        $area->setMesas(10);
        $area->setDescripcion('Gran terraza con bellas vistas de Granada.');

        // avisar a Doctrine que quiero CREAR esta Area
        $entityManager->persist($area);

        // crear el area en la base de datos
        $entityManager->flush();

        return new Response('Saved new area with id '.$area->getId());

    }
}
