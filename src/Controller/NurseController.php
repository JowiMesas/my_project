<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{
    #[Route('/nurse', name: 'app_nurse')]
    public function findByName(): Response
    {
        $json_nurse = file_get_contents('C:\Users\JOELMESASHONTORIA\Documents\Symfony\my_project\src\Controller\DATA.json');
        $json_data = json_decode($json_nurse, true);
        return new Response('<pre>' . print_r($json_data, true) . '</pre>');
    }
}
