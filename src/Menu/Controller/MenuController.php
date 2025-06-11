<?php

namespace App\Menu\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Menu\Repository\MenuRepository;

final class MenuController extends AbstractController
{
    private MenuRepository $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    #[Route('/menu', name: 'menu_carousel')]
    public function index(): Response
    {
        $menus = $this->menuRepository->findBy([], ['position' => 'ASC']);

        // Calcul des variables pour le carousel
        $total = count($menus);
        $radius = 300;
        $tiltX = -20;
        $translateY = 10;

        return $this->render('@menu/menu/carousel.html.twig', [
            'menus' => $menus,
            'total' => $total,
            'radius' => $radius,
            'tiltX' => $tiltX,
            'translateY' => $translateY,
        ]);
    }
}
