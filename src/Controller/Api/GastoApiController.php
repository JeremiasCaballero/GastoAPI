<?php


namespace App\Controller\Api;

use App\Repository\GastoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
class GastoApiController{


    /**
     * @Route("/gastos/{id}", name="gastos_api", methods={"GET", "HEAD"} )
     */
    public function getGastosByUser(GastoRepository $gastoRepository, int $id){
        $gastos = $gastoRepository->getGastosByUserId($id);
        return new JsonResponse($gastos, 200);
    }

}







?>