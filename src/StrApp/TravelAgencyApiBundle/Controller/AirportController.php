<?php

namespace StrApp\TravelAgencyApiBundle\Controller;

use StrApp\TravelAgencyApiBundle\Entity\Airport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

/**
 * Airport controller.
 *
 * @Route("airport")
 */
class AirportController extends FOSRestController
{
    /**
     * Se obtiene todos los aeropuertos existentes en la base de datos.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los aeropuertos existentes en la base de datos",
     *     description="Retorna todos los aeropuertos",
     *     views = { "airport","default" },
     *     statusCodes={
     *         200="OK",
     *         400="Los datos son incorrectos",
     *         404="Aeropuertos no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Get("/all", name="airport_getAll")
     */
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $airports = $em->getRepository('TravelAgencyApiBundle:Airport')->findAll();

        if ($airports === null) {
            return new View("there are no airports exist", Response::HTTP_NOT_FOUND);
        }
        return $airports;
    }

    /**
     * Creates a new airport.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Crea un nuevo Aeropuerto",
     *     description="Crea un nuevo Aeropuerto",
     *     views = { "airport","default" },
     *     parameters={
     *          {"name"="airportCode", "dataType"="string","description"="Codigo del aeropuerto", "required"="true"},
     *          {"name"="airportName", "dataType"="string","description"="Nombre del aeropuerto", "required"="true"},
     *          {"name"="officePhone", "dataType"="string","description"="Telefono del aeropuerto", "required"="false"},
     *          {"name"="streetAddress", "dataType"="string","description"="Direccion del aeropuerto", "required"="true"},
     *          {"name"="city", "dataType"="string","description"="Ciudad del aeropuerto", "required"="false"},
     *          {"name"="stateOrProvince", "dataType"="string","description"="Provincia del aeropuerto", "required"="false"},
     *          {"name"="codePostal", "dataType"="integer","description"="Codigo Postal del aeropuerto", "required"="false"},
     *          {"name"="region", "dataType"="string","description"="Region del aeropuerto", "required"="false"},
     *      },
     *     statusCodes={
     *         201="El aeropuerto fue creado con exito",
     *         400="Los datos son incorrectos",
     *         404="Aeropuertos no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Post("/create", name="airport_create")
     */
    public function createAction(Request $request)
    {
        $airport = new Airport();
        $airport->setAirportCode($request->get('airportCode'));
        $airport->setAirportName($request->get('airportName'));
        $airport->setOfficePhone($request->get('officePhone'));
        $airport->setStreetAddress($request->get('streetAddress'));
        $airport->setCity($request->get('city'));
        $airport->setStateOrProvince($request->get('stateOrProvince'));
        $airport->setCodePostal($request->get('codePostal'));
        $airport->setRegion($request->get('region'));
        
        try
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airport);
            $em->flush();
            return new View("Airport Added Successfully", Response::HTTP_OK);
        }
        catch(\Exception $exception)
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Finds and return a airport.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los aeropuertos existentes en la base de datos",
     *     description="Retorna todos los aeropuertos",
     *     views = { "airport","default" },
     *      parameters={
     *          {"name"="id", "dataType"="integer","description"="Id del aeropuerto a encontrar", "required"="true"}
     *      },
     *     statusCodes={
     *         200="OK",
     *         400="Los datos son incorrectos",
     *         404="Aeropuerto no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Get("/read", name="airport_read")
     */
    public function readAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $airport = $em->getRepository('TravelAgencyApiBundle:Airport')->find($request->get('id'));
        if ($airport === null) {
            return new View("there are no airport exist", Response::HTTP_NOT_FOUND);
        }
        return $airport;
    }

    /**
     * Update a new airport.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Actualiza un nuevo Aeropuerto",
     *     description="Actualiza un Aeropuerto",
     *     views = { "airport","default" },
     *     parameters={
     *          {"name"="id", "dataType"="string","description"="Id del aeropuerto", "required"="true"},
     *          {"name"="airportCode", "dataType"="string","description"="Codigo del aeropuerto", "required"="true"},
     *          {"name"="airportName", "dataType"="string","description"="Nombre del aeropuerto", "required"="true"},
     *          {"name"="officePhone", "dataType"="string","description"="Telefono del aeropuerto", "required"="false"},
     *          {"name"="streetAddress", "dataType"="string","description"="Direccion del aeropuerto", "required"="true"},
     *          {"name"="city", "dataType"="string","description"="Ciudad del aeropuerto", "required"="false"},
     *          {"name"="stateOrProvince", "dataType"="string","description"="Provincia del aeropuerto", "required"="false"},
     *          {"name"="codePostal", "dataType"="integer","description"="Codigo Postal del aeropuerto", "required"="false"},
     *          {"name"="region", "dataType"="string","description"="Region del aeropuerto", "required"="false"},
     *      },
     *     statusCodes={
     *         200="El aeropuerto fue actualizado con exito",
     *         400="Los datos son incorrectos",
     *         404="Aeropuerto no encontrado",
     *         500="Error"
     *     }
     *  )
     *
     * @Rest\Post("/update", name="airport_update")
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $airport = $em->getRepository('TravelAgencyApiBundle:Airport')->find($request->get('id'));
        if ($airport === null) {
            return new View("there are no airport exist", Response::HTTP_NOT_FOUND);
        }
        $airport->setAirportCode($request->get('airportCode'));
        $airport->setAirportName($request->get('airportName'));
        $airport->setOfficePhone($request->get('officePhone'));
        $airport->setStreetAddress($request->get('streetAddress'));
        $airport->setCity($request->get('city'));
        $airport->setStateOrProvince($request->get('stateOrProvince'));
        $airport->setCodePostal($request->get('codePostal'));
        $airport->setRegion($request->get('region'));
        $em->flush();          
        return new View("Airport Updated Successfully", Response::HTTP_OK);
        
    }

    /**
     * Deletes a airport entity.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los aeropuertos existentes en la base de datos",
     *     description="Retorna todos los aeropuertos",
     *     views = { "airport","default" },
     *     parameters={
     *          {"name"="id", "dataType"="string","description"="Id del aeropuerto", "required"="true"},
     *      },
     *      statusCodes={
     *         201="El aeropuerto fue eliminado con exito",
     *         400="Los datos son incorrectos",
     *         404="Aeropuertos no encontrado",
     *         500="Error"
     *     }
     *  )
     *
     * @Rest\Delete("/delete", name="airport_delete")
     */
    public function deleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $airport = $em->getRepository('TravelAgencyApiBundle:Airport')->find($request->get('id'));
        if ($airport === null) {
            return new View("there are no airport exist", Response::HTTP_NOT_FOUND);
        }
        $em->remove($airport);
        $em->flush();

        return new View("Airport Deleted Successfully", Response::HTTP_OK);
    }
}
