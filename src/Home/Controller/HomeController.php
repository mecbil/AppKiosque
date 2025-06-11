<?php

namespace App\Home\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): RedirectResponse
    {
        // Redirige vers la route du menu (ici, j'ai mis 'menu_carousel' par exemple)
        return $this->redirectToRoute('menu_carousel');
    }
}
