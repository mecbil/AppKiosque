<?php

namespace App\Menu\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Menu\Repository\MenuRepository;

final class MenuController extends AbstractController
{
    private MenuRepository $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    #[Route('/menu', name: 'menu_index')]
    public function index(): Response
    {
        $menus = $this->menuRepository->findAll();

        return $this->render('@menu/menu/index.html.twig', [
            'menus' => $menus,
        ]);
    }
}
