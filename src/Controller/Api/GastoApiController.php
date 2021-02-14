<?php

namespace App\Controller\Api;

use App\Entity\Gasto;
use App\Repository\GastoRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GastoApiController extends AbstractController{
     
    /**
     * @Route("api/gastos", name="gastos_list", methods={"GET", "Head"} )
     */
    public function list(Request $request, GastoRepository $gastoRepository){
       echo('algo');
           
    }
    /** 
     * @Route("/api/createGasto", name="create_gasto", methods={"GET", "Head"} )
     */
    public function createGasto(Request $request, EntityManagerInterface $em ){
        $gasto = new Gasto();
        $gasto->setTitle('Gasto de los chinos');
        $em->persist($gasto); // controla este objecto de la clase gasto
        $em->flush(); // todo los objetos que hayan sido persistido los mete a la base de datos
        return new JsonResponse(
        [
        'Title' => $gasto->getTitle(),
        'Id' => $gasto->getId(),
        ], 200);
    }
}
?>