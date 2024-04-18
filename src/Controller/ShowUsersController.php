<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowUsersController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/show/users', name: 'app_show_users')]
    public function index(): Response
    {
        // Fetch all users from the database
        $users = $this->entityManager->getRepository(Personne::class)->findAll();

        // Render the template and pass the users data
        return $this->render('show_users/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/delete/user/{id}', name: 'app_delete_user')]
    public function deleteUser(Personne $user): RedirectResponse
    {
        // Delete the user
        $this->entityManager->remove($user);
        $this->entityManager->flush();

        // Redirect back to the show users page
        return $this->redirectToRoute('app_show_users');
    }
}
