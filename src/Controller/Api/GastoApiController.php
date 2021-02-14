<?php


namespace App\Controller\Api;

use App\Repository\GastoRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;



class GastoApiController extends AbstractFOSRestController{
    /**
     * @Rest\Get(path="/gastos")
     * @Rest\View(serializerGroups={"gasto"}, serializerEnableMaxDepthChecks=true)
     */
    public function getActions(GastoRepository $gastoRepository)
    {
        return $gastoRepository->findAll();
    }

}







?>