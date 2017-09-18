<?php

namespace StrApp\TravelAgencyApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agency
 * La clase hace referencia a las localidades de origen y destino
 * de los viajes (travel).
 *
 * @author Armando Garcia
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="StrApp\TravelAgencyApiBundle\Repository\AgencyRepository")
 */
class Agency
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="agencyCode", type="string", length=255)
     */
    private $agencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="agencyName", type="string", length=255)
     */
    private $agencyName;

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


    /***********************
     * INICIO ASOCIACIONES *
     ***********************/
    


    /***********************
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
     * Set agencyCode
     *
     * @param string $agencyCode
     *
     * @return Agency
     */
    public function setAgencyCode($agencyCode)
    {
        $this->agencyCode = $agencyCode;

        return $this;
    }

    /**
     * Get agencyCode
     *
     * @return string
     */
    public function getAgencyCode()
    {
        return $this->agencyCode;
    }

    /**
     * Set agencyName
     *
     * @param string $agencyName
     *
     * @return Agency
     */
    public function setAgencyName($agencyName)
    {
        $this->agencyName = $agencyName;

        return $this;
    }

    /**
     * Get agencyName
     *
     * @return string
     */
    public function getAgencyName()
    {
        return $this->agencyName;
    }

    /**
     * Set officePhone
     *
     * @param string $officePhone
     *
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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
     * @return Agency
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

