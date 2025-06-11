<?php

namespace App\Carrelage\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarrelageController extends AbstractController
{
    #[Route('/carrelage', name: 'app_carrelage')]
    public function index(): Response
    {
        return $this->render('@carrelage/carrelage/index.html.twig', [
            'controller_name' => 'CarrelageController',
        ]);
    }
}
