<?php

namespace StrApp\TravelAgencyApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Airport
 * La clase hace referencia a las localidades de origen y destino
 * de los viajes (travel).
 *
 * @author Armando Garcia
 *
 * @ORM\Table(name="airport")
 * @ORM\Entity(repositoryClass="StrApp\TravelAgencyApiBundle\Repository\AirportRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Airport
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
     * FIN DE BLOQUE ATRIBUTOS COMUNES    *
     **************************************/ 

    /**
     * @var string
     *
     * @ORM\Column(name="airportCode", type="string", length=255)
     */
    private $airportCode;

    /**
     * @var string
     *
     * @ORM\Column(name="airportName", type="string", length=255)
     */
    private $airportName;

    /**
     * @var string
     *
     * @ORM\Column(name="officePhone", type="string", length=20, nullable=true)
     */
    private $officePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="streetAddress", type="string", length=255, nullable=true)
     */
    private $streetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="stateOrProvince", type="string", length=50, nullable=true)
     */
    private $stateOrProvince;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;

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
     * Set airportCode
     *
     * @param string $airportCode
     *
     * @return Airport
     */
    public function setAirportCode($airportCode)
    {
        $this->airportCode = $airportCode;

        return $this;
    }

    /**
     * Get airportCode
     *
     * @return string
     */
    public function getAirportCode()
    {
        return $this->airportCode;
    }

    /**
     * Set airportName
     *
     * @param string $airportName
     *
     * @return Airport
     */
    public function setAirportName($airportName)
    {
        $this->airportName = $airportName;

        return $this;
    }

    /**
     * Get airportName
     *
     * @return string
     */
    public function getAirportName()
    {
        return $this->airportName;
    }

    /**
     * Set officePhone
     *
     * @param string $officePhone
     *
     * @return Airport
     */
    public function setOfficePhone($officePhone)
    {
        $this->officePhone = $officePhone;

        return $this;
    }

    /**
     * Get officePhone
     *
     * @return string
     */
    public function getOfficePhone()
    {
        return $this->officePhone;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     *
     * @return Airport
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Airport
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set stateOrProvince
     *
     * @param string $stateOrProvince
     *
     * @return Airport
     */
    public function setStateOrProvince($stateOrProvince)
    {
        $this->stateOrProvince = $stateOrProvince;

        return $this;
    }

    /**
     * Get stateOrProvince
     *
     * @return string
     */
    public function getStateOrProvince()
    {
        return $this->stateOrProvince;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Airport
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Airport
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }
}
