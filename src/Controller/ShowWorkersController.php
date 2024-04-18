<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Entity\Travailleur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowWorkersController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/show/workers', name: 'app_show_workers')]
    public function index(): Response
    {
        // Fetch all travailleurs from the database
        $travailleurs = $this->entityManager->getRepository(Travailleur::class)->findAll();

        // Render the template and pass the travailleurs data
        return $this->render('show_workers/index.html.twig', [
            'travailleurs' => $travailleurs,
        ]);
    }

    #[Route('/delete/worker/{id}', name: 'app_delete_worker')]
    public function deleteWorker(Travailleur $travailleur): RedirectResponse
    {
        // Get the associated personne
        $personne = $travailleur->getPersonne();

        // Delete the travailleur
        $this->entityManager->remove($travailleur);
        
        // If the associated personne exists, delete it as well
        if ($personne) {
            $this->entityManager->remove($personne);
        }

        $this->entityManager->flush();

        // Redirect back to the show workers page
        return $this->redirectToRoute('app_show_workers');
    }
}
