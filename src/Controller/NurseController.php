<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{
    #[Route('/nurse', name: 'app_nurse', methods:['GET'])]
    public function findByName(Request $peticionNurse): JsonResponse
    {
        $nameNurse = $peticionNurse ->query -> get('first_name');
        $json_nurse = file_get_contents('C:\Users\JOELMESASHONTORIA\Documents\Symfony\my_project\src\Controller\DATA.json');
        $json_data = json_decode($json_nurse, true);
        $filtrarNombre = array_filter($json_data, function($nurse) use ($nameNurse){
            return strtolower($nurse['first_name']) === strtolower($nameNurse);
        });
        return new JsonResponse(array_values($filtrarNombre));
    }
}
