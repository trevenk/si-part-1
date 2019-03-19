<?php
// src/Controller/AreaController.php
namespace App\Controller;

// ...
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Area;

class AreaController extends AbstractController
{

    /**
     * @Route("/roles/admin/area", name="new_area")
     */
    public function newArea()
    {

        // traer el entity manager
        $entityManager = $this->getDoctrine()->getManager();

        // construir e inicializar un area
        $area = new Area();
        $area->setNombre('rio');
        $area->setMesas(5);

        // avisar a Doctrine que quiero CREAR esta Area
        $entityManager->persist($area);

        // crear el area en la base de datos
        $entityManager->flush();

        return new Response('Saved new area with id '.$area->getId());
    }
}