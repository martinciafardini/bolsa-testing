<?php

namespace Bolsa\InscriptosBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preinscriptos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bolsa\InscriptosBundle\Entity\PreinscriptosRepository")
 */
class Preinscriptos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=255)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="confirmado", type="boolean")
     * @Assert\Email()
     */
    private $confirmado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="aviso", type="datetime")
     */
    private $aviso;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Preinscriptos
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Preinscriptos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Preinscriptos
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Preinscriptos
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set confirmado
     *
     * @param boolean $confirmado
     * @return Preinscriptos
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;
    
        return $this;
    }

    /**
     * Get confirmado
     *
     * @return boolean 
     */
    public function getConfirmado()
    {
        return $this->confirmado;
    }

    /**
     * Set aviso
     *
     * @param \DateTime $aviso
     * @return Preinscriptos
     */
    public function setAviso($aviso)
    {
        $this->aviso = $aviso;
    
        return $this;
    }

    /**
     * Get aviso
     *
     * @return \DateTime 
     */
    public function getAviso()
    {
        return $this->aviso;
    }
}
