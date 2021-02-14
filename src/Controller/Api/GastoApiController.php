<?php


namespace App\Controller\Api;

use App\Repository\GastoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
class GastoApiController{


    /**
     * @Route("/gastos", name="gastos_api", methods={"GET", "HEAD"} )
     */
    public function getGastos(Request $request, GastoRepository $gastoRepository){
        $gastos = $gastoRepository->findAll();
        return new JsonResponse($gastos, 200);
    }

}







?>