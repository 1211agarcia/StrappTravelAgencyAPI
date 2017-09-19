<?php

namespace StrApp\TravelAgencyApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use StrApp\TravelAgencyApiBundle\Entity\Airport;
use StrApp\TravelAgencyApiBundle\Entity\Passenger;

/**
 * Travel
 *
 * La clase hace referencia a los viajes (travel).
 *
 * @author Armando Garcia
 *
 * @ORM\Table(name="travel")
 * @ORM\Entity(repositoryClass="StrApp\TravelAgencyApiBundle\Repository\TravelRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var \StrApp\TravelAgencyApiBundle\Entity\Airport
     * Muchos Travel tienen como origen un Airport.
     * @ORM\ManyToOne(targetEntity="airport", cascade={"persist"})
     * @ORM\JoinColumn(name="originairport_id", referencedColumnName="id")
     */
    private $originAirport;
    /**
     * Agencia destino del viaje
     *
     * @var \StrApp\TravelAgencyApiBundle\Entity\Airport
     * Muchos Travel tienen como destino un Airport.
     * @ORM\ManyToOne(targetEntity="airport", cascade={"persist"})
     * @ORM\JoinColumn(name="destinationairport_id", referencedColumnName="id")
     */
    private $destinationAirport;
    /**
      * Pasajero que cubre el viaje
      *
      * @var \StrApp\TravelAgencyApiBundle\Entity\Passenger
      * Muchos Travel es cubierto por un Passeger.
      * @ORM\ManyToOne(targetEntity="passenger", inversedBy="travels")
      * @ORM\JoinColumn(name="passenger_id", referencedColumnName="id")
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

    /**
     * Set originAirport
     *
     * @param \StrApp\TravelAgencyApiBundle\Entity\airport $originAirport
     *
     * @return Travel
     */
    public function setOriginAirport(\StrApp\TravelAgencyApiBundle\Entity\airport $originAirport = null)
    {
        $this->originAirport = $originAirport;

        return $this;
    }

    /**
     * Get originAirport
     *
     * @return \StrApp\TravelAgencyApiBundle\Entity\airport
     */
    public function getOriginAirport()
    {
        return $this->originAirport;
    }

    /**
     * Set destinationAirport
     *
     * @param \StrApp\TravelAgencyApiBundle\Entity\airport $destinationAirport
     *
     * @return Travel
     */
    public function setDestinationAirport(\StrApp\TravelAgencyApiBundle\Entity\airport $destinationAirport = null)
    {
        $this->destinationAirport = $destinationAirport;

        return $this;
    }

    /**
     * Get destinationAirport
     *
     * @return \StrApp\TravelAgencyApiBundle\Entity\airport
     */
    public function getDestinationAirport()
    {
        return $this->destinationAirport;
    }

    /**
     * Set passenger
     *
     * @param \StrApp\TravelAgencyApiBundle\Entity\passenger $passenger
     *
     * @return Travel
     */
    public function setPassenger(\StrApp\TravelAgencyApiBundle\Entity\passenger $passenger = null)
    {
        $this->passenger = $passenger;

        return $this;
    }

    /**
     * Get passenger
     *
     * @return \StrApp\TravelAgencyApiBundle\Entity\passenger
     */
    public function getPassenger()
    {
        return $this->passenger;
    }
}
