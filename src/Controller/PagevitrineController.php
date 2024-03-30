<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagevitrineController extends AbstractController
{
    #[Route('/Welcome', name: 'app_pagevitrine')]
    public function index(): Response
    {
        return $this->render('pagevitrine/PageVitrine.html.twig');
    }
}
