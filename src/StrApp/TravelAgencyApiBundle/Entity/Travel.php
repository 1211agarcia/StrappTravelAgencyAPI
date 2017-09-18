<?php

namespace StrApp\TravelAgencyApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travel
 *
 * La clase hace referencia a los viajes (travel).
 *
 * @author Armando Garcia
 *
 * @ORM\Table(name="travel")
 * @ORM\Entity(repositoryClass="StrApp\TravelAgencyApiBundle\Repository\TravelRepository")
 */
class Travel
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
     */
    private $updated;
     /**
    * Guarda la fecha de actualizacion
    * @var \DateTime
    */
    private $created;

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
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
     * @param \DateTime $created
     *
     */
     public function setCreated($created)
     {
         $this->created = $created;
 
         return $this;
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
     * @ORM\Column(name="travelCode", type="string", length=255, unique=true)
     */
    private $travelCode;

    /**
     * @var int
     *
     * @ORM\Column(name="numberPlaces", type="integer")
     */
    private $numberPlaces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="travelDate", type="datetime")
     */
    private $travelDate;

    /**
     * @var string
     *
     * @ORM\Column(name="additionalInformation", type="string", length=255)
     */
    private $additionalInformation;


    /***********************
     * INICIO ASOCIACIONES *
     ***********************/
    /**
     * Agencia origen del viaje
     *
     * @var \StrApp\TravelAgencyApiBundle\Entity\Agency
     */
    private $originAgency;
     /**
      * Agencia destino del viaje
      *
      * @var \StrApp\TravelAgencyApiBundle\Entity\Agency
      */
    private $destinyAgency;
     /**
      * Usuario asociado al viaje
      *
      * @var \StrApp\TravelAgencyApiBundle\Entity\Passenger
      */
    private $passenger;

    /**********************
    *   FIN ASOCIACIONES  *
    ***********************/


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
     * Set travelCode
     *
     * @param string $travelCode
     *
     * @return Travel
     */
    public function setTravelCode($travelCode)
    {
        $this->travelCode = $travelCode;

        return $this;
    }

    /**
     * Get travelCode
     *
     * @return string
     */
    public function getTravelCode()
    {
        return $this->travelCode;
    }

    /**
     * Set numberPlaces
     *
     * @param integer $numberPlaces
     *
     * @return Travel
     */
    public function setNumberPlaces($numberPlaces)
    {
        $this->numberPlaces = $numberPlaces;

        return $this;
    }

    /**
     * Get numberPlaces
     *
     * @return int
     */
    public function getNumberPlaces()
    {
        return $this->numberPlaces;
    }

    /**
     * Set travelDate
     *
     * @param \DateTime $travelDate
     *
     * @return Travel
     */
    public function setTravelDate($travelDate)
    {
        $this->travelDate = $travelDate;

        return $this;
    }

    /**
     * Get travelDate
     *
     * @return \DateTime
     */
    public function getTravelDate()
    {
        return $this->travelDate;
    }

    /**
     * Set additionalInformation
     *
     * @param string $additionalInformation
     *
     * @return Travel
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additionalInformation = $additionalInformation;

        return $this;
    }

    /**
     * Get additionalInformation
     *
     * @return string
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }
}

