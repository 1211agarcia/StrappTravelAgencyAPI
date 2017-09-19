<?php

namespace StrApp\TravelAgencyApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use StrApp\TravelAgencyApiBundle\Entity\Travel;

/**
 * Passenger
 *
 * La clase hace referencia a los Pasajeros.
 *
 * @author Armando Garcia
 *
 * @ORM\Table(name="passenger")
 * @ORM\Entity(repositoryClass="StrApp\TravelAgencyApiBundle\Repository\PassengerRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Passenger
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**************************************
    * INICIO DE BLOQUE ATRIBUTOS COMUNES  *
    *                                     *
    * Atributos para labores de auditoria *
    **************************************/
    
    /**
     * Guarda la fecha de actualizacion
     * @var \DateTime
     * @ORM\Column(name="updated", type="datetime")
     *
     */
     private $updated;
     /**
     * Guarda la fecha de actualizacion
     * @var \DateTime
     * @ORM\Column(name="created", type="datetime")
     */
     private $created;
 
     /**
      * Set updated
      * @ORM\PreUpdate  
      */
    public function setUpdated()
    {
         $this->updated = new \DateTime();
    }
 
     /**
      * Get updated
      *
      * @return \DateTime
      */
     public function getUpdated()
     {
         return $this->updated;
     }
 
     /**
      * Set created
      *
      * @ORM\PrePersist
      */
    public function setCreated()
    {
          $this->created = new \DateTime();
          $this->updated = new \DateTime();
    }
  
    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
     
    /*************************************
     * FIN DE BLOQUE ATRIBUTOS COMUNES   *
     *************************************/
    /**
     * @var int
     *
     * @ORM\Column(name="identityCard", type="integer", unique=true)
     */
    private $identityCard;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=25)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /***********************
     * INICIO ASOCIACIONES *
     ***********************/
    /**
     * @var \StrApp\TravelAgencyApiBundle\Entity\Travel
     * Una persona tienes Muchos viajes.
     * @ORM\OneToMany(targetEntity="travel", mappedBy="passenger", cascade={"persist", "remove"})
     */
    private $travels;
     
    /***********************
     *   FIN ASOCIACIONES  *
     ***********************/
    
    public function __construct() {
        $this->travels = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set identityCard
     *
     * @param integer $identityCard
     *
     * @return Passenger
     */
    public function setIdentityCard($identityCard)
    {
        $this->identityCard = $identityCard;

        return $this;
    }

    /**
     * Get identityCard
     *
     * @return int
     */
    public function getIdentityCard()
    {
        return $this->identityCard;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Passenger
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Passenger
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Passenger
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Passenger
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add travel
     *
     * @param \StrApp\TravelAgencyApiBundle\Entity\travel $travel
     *
     * @return Passenger
     */
    public function addTravel(\StrApp\TravelAgencyApiBundle\Entity\travel $travel)
    {
        $this->travels[] = $travel;

        return $this;
    }

    /**
     * Remove travel
     *
     * @param \StrApp\TravelAgencyApiBundle\Entity\travel $travel
     */
    public function removeTravel(\StrApp\TravelAgencyApiBundle\Entity\travel $travel)
    {
        $this->travels->removeElement($travel);
    }

    /**
     * Get travels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTravels()
    {
        return $this->travels;
    }
}
