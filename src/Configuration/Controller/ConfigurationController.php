<?php

namespace App\Configuration\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConfigurationController extends AbstractController
{
    #[Route('/configuration', name: 'app_configuration')]
    public function index(): Response
    {
        return $this->render('@configuration/configuration/configuration.html.twig', [
            'controller_name' => 'ConfigurationController',
        ]);
    }
}
