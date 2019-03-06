<?php
/**
 * Created by PhpStorm.
 * User: trevenk
 * Date: 6/03/19
 * Time: 16:29
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('OMG!! This is working!!!');
    }

    /**
     * @Route("/roles/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page will show the role: %s',
            $slug
        ));
    }
}