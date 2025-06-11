<?php

namespace App\RendezVous\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RendezVousController extends AbstractController
{
    #[Route('/rendezvous', name: 'app_rendez_vous')]
    public function index(): Response
    {
        return $this->render('@rendezvous/rendez_vous/index.html.twig', [
            'controller_name' => 'RendezVousController',
        ]);
    }
}
