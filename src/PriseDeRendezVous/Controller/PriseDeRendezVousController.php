<?php

namespace App\PriseDeRendezVous\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PriseDeRendezVousController extends AbstractController
{
    #[Route('/prisederendezvous', name: 'app_prise_de_rendez_vous')]
    public function index(): Response
    {
        return $this->render('@prisederendezvous/prise_de_rendez_vous/prise_de_rendez_vous.html.twig', [
            'controller_name' => 'PriseDeRendezVousController',
        ]);
    }
}
