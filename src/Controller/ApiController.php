<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CurlService;

class ApiController{

    /**
     * @Route("/get_questions", methods={"GET"}, name="get_questions")
     *
     * @return void
     */
    public function get_questions(Request $request, CurlService $curlService):JsonResponse{

        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        
        if($request->get('tagged')){
            $api_response = $curlService->call_api($_SERVER['QUERY_STRING']);
            $response = JsonResponse::fromJsonString($api_response);
        }else{
            $response->setData([
                'status'  => 'ko',
                'message' => 'No se ha incluiudo el parámetro obligatorio tagged'
            ]);
        }
       
        return $response;
    }

}