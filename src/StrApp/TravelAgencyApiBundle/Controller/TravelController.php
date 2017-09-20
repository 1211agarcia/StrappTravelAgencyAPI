<?php

namespace StrApp\TravelAgencyApiBundle\Controller;

use StrApp\TravelAgencyApiBundle\Entity\Travel;
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
 * Travel controller.
 *
 * @Route("travel")
 */
class TravelController extends FOSRestController
{
    /**
     * Se obtiene todos los vuelos existentes en la base de datos.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los vuelos existentes en la base de datos",
     *     description="Retorna todos los vuelos",
     *     views = { "travel","default" },
     *     statusCodes={
     *         200="OK",
     *         400="Los datos son incorrectos",
     *         404="Vuelos no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Get("/all", name="travel_getAll")
     */
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $travels = $em->getRepository('TravelAgencyApiBundle:Travel')->findAll();

        if ($travels === null) {
            return new View("there are no travels exist", Response::HTTP_NOT_FOUND);
        }
        return $travels;
    }

    /**
     * Creates a new travel.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Crea un nuevo Vuelo",
     *     description="Crea un nuevo Vuelo",
     *     views = { "travel","default" },
     *     parameters={
     *          {"name"="travelCode", "dataType"="string","description"="Codigo del vuelo", "required"="true"},
     *          {"name"="travelDate", "dataType"="datetime","description"="Fecha del vuelo", "required"="true"},
     *          {"name"="additionalInformation", "dataType"="string","description"="Telefono del vuelo", "required"="false"},
     *          {"name"="destinationAirport", "dataType"="Airport","description"="Aeropuerto destino del vuelo", "required"="true"},
     *          {"name"="originAirport", "dataType"="Airport","description"="Aeropuerto origen del vuelo", "required"="true"},
     *          {"name"="numberPlaces", "dataType"="integer","description"="Numero de plazas del vuelo", "required"="true"},
     *          {"name"="passenger", "dataType"="string","description"="Passenger del vuelo", "required"="true"},
     *      },
     *     statusCodes={
     *         201="El vuelo fue creado con exito",
     *         400="Los datos son incorrectos",
     *         404="Vuelos no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Post("/create", name="travel_create")
     */
    public function createAction(Request $request)
    {
        $travel = new Travel();
        $travel->setTravelCode($request->get('travelCode'));
        $travel->setTravelName($request->get('travelDate'));
        $travel->setAdditionalInformation($request->get('additionalInformation'));
        $travel->setDestinationAirport($request->get('destinationAirport'));
        $travel->setOriginAirport($request->get('originAirport'));
        $travel->setNumberPlaces($request->get('numberPlaces'));
        $travel->setRegion($request->get('passenger'));
        
        try
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($travel);
            $em->flush();
            return new View("Travel Added Successfully", Response::HTTP_OK);
        }
        catch(\Exception $exception)
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Finds and return a travel.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los vuelos existentes en la base de datos",
     *     description="Retorna todos los vuelos",
     *     views = { "travel","default" },
     *      parameters={
     *          {"name"="id", "dataType"="integer","description"="Id del vuelo a encontrar", "required"="true"}
     *      },
     *     statusCodes={
     *         200="OK",
     *         400="Los datos son incorrectos",
     *         404="Vuelo no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Get("/read", name="travel_read")
     */
    public function readAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $travel = $em->getRepository('TravelAgencyApiBundle:Travel')->find($request->get('id'));
        if ($travel === null) {
            return new View("there are no travel exist", Response::HTTP_NOT_FOUND);
        }
        return $travel;
    }

    /**
     * Update a new travel.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Crea un nuevo Vuelo",
     *     description="",
     *     views = { "travel","default" },
     *     parameters={
     *          {"name"="id", "dataType"="string","description"="Id del vuelo", "required"="true"},
     *          {"name"="travelCode", "dataType"="string","description"="Codigo del vuelo", "required"="true"},
     *          {"name"="travelDate", "dataType"="datetime","description"="Fecha del vuelo", "required"="true"},
     *          {"name"="additionalInformation", "dataType"="string","description"="Telefono del vuelo", "required"="false"},
     *          {"name"="destinationAirport", "dataType"="Airport","description"="Aeropuerto destino del vuelo", "required"="true"},
     *          {"name"="originAirport", "dataType"="Airport","description"="Aeropuerto origen del vuelo", "required"="true"},
     *          {"name"="numberPlaces", "dataType"="integer","description"="Numero de plazas del vuelo", "required"="true"},
     *          {"name"="passenger", "dataType"="string","description"="Passenger del vuelo", "required"="true"},
     *      },
     *     statusCodes={
     *         200="El vuelo fue actualizado con exito",
     *         400="Los datos son incorrectos",
     *         404="Vuelo no encontrado",
     *         500="Error"
     *     }
     *  )
     *
     * @Rest\Post("/update", name="travel_update")
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $travel = $em->getRepository('TravelAgencyApiBundle:Travel')->find($request->get('id'));
        if ($travel === null) {
            return new View("there are no travel exist", Response::HTTP_NOT_FOUND);
        }
        $travel->setTravelCode($request->get('travelCode'));
        $travel->setTravelName($request->get('travelDate'));
        $travel->setAdditionalInformation($request->get('additionalInformation'));
        $travel->setDestinationAirport($request->get('destinationAirport'));
        $travel->setOriginAirport($request->get('originAirport'));
        $travel->setNumberPlaces($request->get('numberPlaces'));
        $travel->setRegion($request->get('passenger'));
        $em->flush();          
        return new View("Travel Updated Successfully", Response::HTTP_OK);
        
    }

    /**
     * Deletes a travel entity.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los vuelos existentes en la base de datos",
     *     description="Retorna todos los vuelos",
     *     views = { "travel","default" },
     *     parameters={
     *          {"name"="id", "dataType"="string","description"="Id del vuelo", "required"="true"},
     *      },
     *      statusCodes={
     *         201="El vuelo fue eliminado con exito",
     *         400="Los datos son incorrectos",
     *         404="Vuelos no encontrado",
     *         500="Error"
     *     }
     *  )
     *
     * @Rest\Delete("/delete", name="travel_delete")
     */
    public function deleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $travel = $em->getRepository('TravelAgencyApiBundle:Travel')->find($request->get('id'));
        if ($travel === null) {
            return new View("there are no travel exist", Response::HTTP_NOT_FOUND);
        }
        $em->remove($travel);
        $em->flush();

        return new View("Travel Deleted Successfully", Response::HTTP_OK);
    }
}
