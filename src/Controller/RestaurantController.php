<?php
/**
 * Created by PhpStorm.
 * User: trevenk
 * Date: 6/03/19
 * Time: 16:29
 */

namespace App\Controller;


use App\Entity\Area;
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
        // Esto iri'ia en el modelo
        switch ($slug){
            case 'camarero':
                $pedidos = [
                    [
                        "mesa" => 'Terraza/1',
                        "estado" => 'Entregado',
                    ],
                    [
                        "mesa" => 'Terraza/5',
                        "estado" => 'Pendiente',
                    ],
                    [
                        "mesa" => 'Rio/5',
                        "estado" => 'Pendiente',
                    ],
                    [
                        "mesa" => 'Comedor/5',
                        "estado" => 'Entregado',
                    ],
                    [
                        "mesa" => 'Piscina/1',
                        "estado" => 'Entregado',
                    ],
                    [
                        "mesa" => 'Piscina/2',
                        "estado" => 'Pendiente',
                    ],
                    [
                        "mesa" => 'Rio/4',
                        "estado" => 'Entregado',
                    ],
                    [
                        "mesa" => 'Terraza/3',
                        "estado" => 'Entregado',
                    ],
                ];

                return $this->render('roles/camarero.html.twig',[
                    'pedidos' => $pedidos,
                ]);
                break;

            case 'cocina':
                return $this->render('roles/cocina.html.twig');
                break;

            case 'barra':
                return $this->render('roles/barra.html.twig');
                break;

            case 'admin':

                return $this->render('roles/admin/admin-dashboard.html.twig');
                break;

            default:
                return $this->render('roles/admin.html.twig');

        }



    }

    /**
     * @Route("/roles/pedidos/new-pedido-mesa", name="app_new_pedido")
     */

    public function nuevoPedido()
    {
        // traer el repositorio de la clase Area
        $repository = $this->getDoctrine()->getRepository(Area::class);

        // leer todos los objetos Area en la base de datos
        $areas = $repository->findAll();

        return $this->render('roles/pedidos/new-pedido-mesa.html.twig',[
            'areas' => $areas,
        ]);

    }

    /**
     * @Route("/roles/pedidos/new-pedido-articulo", name="app_new_pedido_articulo")
     */

    public function addPedidoArticulo()
    {
        return $this->render('roles/pedidos/new-pedido-articulo.html.twig');
    }

    /**
     * @Route("/roles/admin/admin-dashboard", name="app_admin")
     */

    public function appAdmin()
    {
        return $this->render('roles/admin/admin-dashboard.html.twig');
    }


    /**
     * @Route("/roles/{slug}/heart", name="roles_toggle_heart", methods={"POST"})
     */

    public function toggleRoleHeart($slug)
    {
        // TODO - actually heart/unheart the article!

        return $this->json(['hearts' => rand(5, 100)]);
    }




}


