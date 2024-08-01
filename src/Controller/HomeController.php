<?php

namespace App\Controller;

use App\Repository\LivreRepository as LR;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LR $livreRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'livres' => $livreRepository->findAll(),
        ]);
    }
}
