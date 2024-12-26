<?php

namespace App\Controller;


use App\Repository\AdherentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AdherentRepository $repository): Response
    {
        return $this->render('home/index.html.twig', [
            // 'Adherent' => $repository->findAll(),
        ]);
    }
}
