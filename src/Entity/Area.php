<?php
/**
 * Created by PhpStorm.
 * User: trevenk
 * Date: 19/03/19
 * Time: 9:34
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AreaRepository")
 */
class Area
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $mesas;


    //getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getMesas()
    {
        return $this->mesas;
    }

    //and setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setMesas($mesas)
    {
        $this->mesas = $mesas;
    }



}