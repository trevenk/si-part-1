<?php
/**
 * Created by PhpStorm.
 * User: trevenk
 * Date: 6/03/19
 * Time: 16:29
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('roles/homepage.html.twig');
    }



    /**
     * @Route("/roles/roles", name="app_roles_show")
     */
    public function selectRole()
    {
        return $this->render('roles/roles.html.twig');
    }

    /**
     * @Route("/roles/{slug}", name="roles_show")
     */
    public function show($slug)
    {
        $comments = [
            'Cuando el misterio es demasiado impresionante, es imposible desobedecer.',
            'Por absurdo que aquello me pareciera, a mil millas de distancia de todo lugar habitado y en peligro de muerte, saqué de mi
bolsillo una hoja de papel y una pluma fuente.',
            'Recordé que yo había estudiado especialmente geografía, historia, cálculo y gramática y le dije al muchachito
            (ya un poco malhumorado), que no sabía dibujar.',
        ];
        return $this->render('roles/show.html.twig',[
            'title' => ucwords(str_replace('_',' ',$slug)),
            'slug' => $slug,
            'comments' => $comments,
    ]);
    }

    /**
     * @Route("/roles/{slug}/heart", name="roles_toggle_heart", methods={"POST"})
     */

    public  function toggleRoleHeart($slug)
    {
        // TODO - actually heart/unheart the article!

        return $this->json(['hearts' => rand(5, 100)]);
    }




}


