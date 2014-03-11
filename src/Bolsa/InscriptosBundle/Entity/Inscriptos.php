<?php

namespace Bolsa\InscriptosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Inscriptos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bolsa\InscriptosBundle\Entity\InscriptosRepository")
 */
class Inscriptos implements UserInterface, \Serializable
{
    
    /**
     * Método requerido por la interfaz UserInterface
     */
    public function eraseCredentials()
    {
    }

  

    /**
     * Método requerido por la interfaz UserInterface
     */
    public function getUsername()
    {
        return $this->getEmail();
    }
    
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
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=10)
     */
    private $dni;
    
   /**
    * @ORM\Column(type="string", length=255)
    */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    
    /**
     * @var string salt
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="avisos", type="string", length=2)
     */
    private $avisos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificado", type="datetime")
     */
    private $modificado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="nacimiento", type="datetime")
     */
    private $nacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=2)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string", length=255)
     */
    private $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5)
     */
    private $cp;
    
    
    /**
     * se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    protected $user_roles;
    
    public function __construct()
    {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add user_roles
     *
     * @param Bolsa\InscriptosBundle\Entity\Role $userRoles
     */
    public function addRole(\Bolsa\InscriptosBundle\Entity\Role $userRoles)
    {
        $this->user_roles[] = $userRoles;
    }

    public function setUserRoles($roles) {
        $this->user_roles = $roles;
    }

    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->user_roles;
    }

    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }
    
    /**
     * Compares this user to another to determine if they are the same.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());

    }
    
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
     * @return Inscriptos
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
     * @return Inscriptos
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
     * @return Inscriptos
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

   
    
    /**
     * Set password
     *
     * @param string $password
     * @return Inscriptos
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
        /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }
    

    /**
     * Set email
     *
     * @param string $email
     * @return Inscriptos
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
     * Set avisos
     *
     * @param boolean $avisos
     * @return Inscriptos
     */
    public function setAvisos($avisos)
    {
        $this->avisos = $avisos;
    
        return $this;
    }

    /**
     * Get avisos
     *
     * @return boolean 
     */
    public function getAvisos()
    {
        return $this->avisos;
    }

    /**
     * Set modificado
     *
     * @param \DateTime $modificado
     * @return Inscriptos
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    
        return $this;
    }

    /**
     * Get modificado
     *
     * @return \DateTime 
     */
    public function getModificado()
    {
        return $this->modificado;
    }

    /**
     * Set nacimiento
     *
     * @param \DateTime $nacimiento
     * @return Inscriptos
     */
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    
        return $this;
    }

    /**
     * Get nacimiento
     *
     * @return \DateTime 
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Inscriptos
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Inscriptos
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    
        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Inscriptos
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
}
