<?php

namespace StrApp\TravelAgencyApiBundle\Controller;

use StrApp\TravelAgencyApiBundle\Entity\Passenger;
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
 * Passenger controller.
 *
 * @Route("passenger")
 */
class PassengerController extends FOSRestController
{
    /**
     * Se obtiene todos los pasajeros existentes en la base de datos.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los pasajeros existentes en la base de datos",
     *     description="Retorna todos los pasajeros",
     *     views = { "passenger","default" },
     *     statusCodes={
     *         200="OK",
     *         400="Los datos son incorrectos",
     *         404="Pasajeros no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Get("/all", name="passenger_getAll")
     */
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $passengers = $em->getRepository('TravelAgencyApiBundle:Passenger')->findAll();

        if ($passengers === null) {
            return new View("there are no passengers exist", Response::HTTP_NOT_FOUND);
        }
        return $passengers;
    }

    /**
     * Creates a new passenger.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Crea un nuevo Pasajero",
     *     description="Crea un nuevo Pasajero",
     *     views = { "passenger","default" },
     *     parameters={
     *          {"name"="firstName", "dataType"="string","description"="Nombre del pasajero", "required"="true"},
     *          {"name"="lastName", "dataType"="string","description"="Apellido del pasajero", "required"="true"},
     *          {"name"="identityCard", "dataType"="string","description"="Cédula de identidad", "required"="true"},
     *          {"name"="address", "dataType"="string","description"="Dirección del pasajero", "required"="true"},
     *          {"name"="phone", "dataType"="string","description"="Teléfono del pasajero", "required"="true"},
     *      },
     *     statusCodes={
     *         201="El pasajero fue creado con exito",
     *         400="Los datos son incorrectos",
     *         404="Pasajeros no encontrado",
     *         500="Error"
     *     }
     *  )*
     * @Rest\Post("/create", name="passenger_create")
     */
    public function createAction(Request $request)
    {
        $passenger = new Passenger();
        $passenger->setFirstName($request->get('firstName'));
        $passenger->setLastName($request->get('lastName'));
        $passenger->setIdentityCard($request->get('identityCard'));
        $passenger->setAddress($request->get('address'));
        $passenger->setPhone($request->get('phone'));
        
        try
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passenger);
            $em->flush();
            return new View("Passenger Added Successfully", Response::HTTP_OK);
        }
        catch(\Exception $exception)
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Finds and return a passenger.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los pasajeros existentes en la base de datos",
     *     description="Retorna todos los pasajeros",
     *     views = { "passenger","default" },
     *      parameters={
     *          {"name"="id", "dataType"="integer","description"="Id del pasajero a encontrar", "required"="true"}
     *      },
     *     statusCodes={
     *         200="OK",
     *         400="Los datos son incorrectos",
     *         404="Pasajero no encontrado",
     *         500="Error"
     *     }
     *  )
     * @Rest\Get("/read", name="passenger_read")
     */
    public function readAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $passenger = $em->getRepository('TravelAgencyApiBundle:Passenger')->find($request->get('id'));
        if ($passenger === null) {
            return new View("there are no passenger exist", Response::HTTP_NOT_FOUND);
        }
        return $passenger;
    }

    /**
     * Update a new passenger.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Actualiza un Pasajero",
     *     description="Actualiza un Pasajero",
     *     views = { "passenger","default" },
     *     parameters={
     *          {"name"="id", "dataType"="string","description"="Id del pasajero", "required"="true"},
     *          {"name"="firstName", "dataType"="string","description"="Nombre del pasajero", "required"="true"},
     *          {"name"="lastName", "dataType"="string","description"="Apellido del pasajero", "required"="true"},
     *          {"name"="identityCard", "dataType"="string","description"="Cédula de identidad", "required"="true"},
     *          {"name"="address", "dataType"="string","description"="Dirección del pasajero", "required"="true"},
     *          {"name"="phone", "dataType"="string","description"="Teléfono del pasajero", "required"="true"},
     *      },
     *     statusCodes={
     *         200="El pasajero fue actualizado con exito",
     *         400="Los datos son incorrectos",
     *         404="Pasajero no encontrado",
     *         500="Error"
     *     }
     *  )
     *
     * @Rest\Post("/update", name="passenger_update")
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $passenger = $em->getRepository('TravelAgencyApiBundle:Passenger')->find($request->get('id'));
        if ($passenger === null) {
            return new View("there are no passenger exist", Response::HTTP_NOT_FOUND);
        }
        $passenger->setFirstName($request->get('firstName'));
        $passenger->setLastName($request->get('lastName'));
        $passenger->setIdentityCard($request->get('identityCard'));
        $passenger->setAddress($request->get('address'));
        $passenger->setPhone($request->get('phone'));
        $em->flush();          
        return new View("Passenger Updated Successfully", Response::HTTP_OK);
        
    }

    /**
     * Deletes a passenger entity.
     * @return json
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Se obtiene todos los pasajeros existentes en la base de datos",
     *     description="Retorna todos los pasajeros",
     *     views = { "passenger","default" },
     *     parameters={
     *          {"name"="id", "dataType"="string","description"="Id del pasajero", "required"="true"},
     *      },
     *      statusCodes={
     *         201="El pasajero fue eliminado con exito",
     *         400="Los datos son incorrectos",
     *         404="Pasajeros no encontrado",
     *         500="Error"
     *     }
     *  )
     *
     * @Rest\Delete("/delete", name="passenger_delete")
     */
    public function deleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        
        $passenger = $em->getRepository('TravelAgencyApiBundle:Passenger')->find($request->get('id'));
        if ($passenger === null) {
            return new View("there are no passenger exist", Response::HTTP_NOT_FOUND);
        }
        $em->remove($passenger);
        $em->flush();

        return new View("Passenger Deleted Successfully", Response::HTTP_OK);
    }
}
