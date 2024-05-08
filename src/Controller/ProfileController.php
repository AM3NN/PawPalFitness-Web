<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personne; // Import your User entity here
use Doctrine\ORM\EntityManagerInterface; // Import EntityManagerInterface
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/profile/{id}', name: 'app_profile')]
    public function index(int $id): Response
    {
        $user = $this->entityManager->find(Personne::class, $id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'user' => $user,
        ]);
    }
    #[Route('/profile/{id}/delete', name: 'app_delete_account', methods: ['POST'])]
    public function deleteAccount(Request $request, int $id): Response
    {
        $user = $this->entityManager->find(Personne::class, $id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete_account', $request->request->get('_token'))) {
            // Delete the user account
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            // Optionally, you can log the user out or perform any additional actions here

            // Redirect to a success page or homepage
            return $this->redirectToRoute('app_login');
        }

        // If CSRF token is invalid, you can handle it as needed
        // For example, redirect back to the profile page with an error message
        return $this->redirectToRoute('app_profile', ['id' => $id]);
    }
}
