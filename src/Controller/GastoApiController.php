<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class GastoApiController extends AbstractController{
     
    /**
     * @Route("/api/blog", name="blog_list", methods={"GET", "Head"} )
     */
    public function list(){
       return new JsonResponse(['message' => 'Api andando'], 200);
    }
}
?>