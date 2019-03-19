<?php
/**
 * Created by PhpStorm.
 * User: trevenk
 * Date: 19/03/19
 * Time: 9:39
 */

namespace App\Controller;


// ...
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Area;

class AreaController extends AbstractController
{
    /**
     * @Route("/area", name="area")
     */
    public function index()
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