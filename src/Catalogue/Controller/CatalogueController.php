<?php

namespace App\Catalogue\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catalogue')]
    public function index(): Response
    {
        return $this->render('@catalogue/catalogue/catalogue.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }
}
