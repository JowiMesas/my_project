<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;


class NurseController extends AbstractController
{
    #[Route('/findName', name: 'app_nurse_findName')]
    public function findName(Request $peticionNurse): JsonResponse
    {
        $nameNurse = $peticionNurse->query->get('first_name');
        $json_nurse = file_get_contents('DATA.json');
        $json_data = json_decode($json_nurse, associative: true);
        $filtrarNombre = array_filter($json_data, function ($nurse) use ($nameNurse) {
            return strtolower($nurse['first_name']) === strtolower($nameNurse);
        });
        if (!empty($filtrarNombre)) {
            // Retornar los resultados y el código de estado 200
            return new JsonResponse(array_values($filtrarNombre), Response::HTTP_OK);
        } else {
            // Si no se encuentra el nombre, retornar 404 con un mensaje
            return new JsonResponse(['message' => 'El enfermero con ese nombre no existe.'], Response::HTTP_NOT_FOUND);
        }
    }
}
