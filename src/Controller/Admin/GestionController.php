<?php

namespace App\Controller\Admin;

use App\Repository\AbonneRepository;
use App\Repository\EmpruntRepository;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionController extends AbstractController
{
    #[Route('/admin/gestion', name: 'app_admin_gestion')]
    public function index(LivreRepository $lr, EmpruntRepository $er, AbonneRepository $ar): Response
    {
        return $this->render('admin/gestion/index.html.twig', [
            "abonnnes"  =>  $ar->findAll(),
            "livres"    =>  $lr->findAll(),
            "emprunts"  =>  $er->findAll(),
        ]);
    }
}
