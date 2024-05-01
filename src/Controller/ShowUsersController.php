<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
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

    #[Route('/ban/user/{id}', name: 'app_ban_user')]
    public function banUser(Personne $user): RedirectResponse
    {
        // Ban the user
        $user->setIsBanned(true);
        $this->entityManager->flush();

        // Redirect back to the show users page
        return $this->redirectToRoute('app_show_users');
    }

    #[Route('/unban/user/{id}', name: 'app_unban_user')]
    public function unbanUser(Personne $user): RedirectResponse
    {
        // Unban the user
        $user->setIsBanned(false);
        $this->entityManager->flush();

        // Redirect back to the show users page
        return $this->redirectToRoute('app_show_users');
    }

    #[Route('/export-users-csv', name: 'export_users_csv')]
    public function exportUsersCsv(): Response
    {
        $users = $this->entityManager->getRepository(Personne::class)->findAll();

        $output = fopen('php://temp', 'w+');

        fputcsv($output, ['ID', 'Nom', 'Prénom', 'Région', 'Email', 'Age', 'Role']);

        foreach ($users as $user) {
            fputcsv($output, [
                $user->getId(),
                $user->getNom(),
                $user->getPrenom(),
                $user->getRegion(),
                $user->getEmail(),
                $user->getAge(),
            ]);
        }

        rewind($output);

        $csv = stream_get_contents($output);
        fclose($output);

        $response = new Response($csv);

        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'users.csv'
        );

        $response->headers->set('Content-Disposition', $disposition);
        $response->headers->set('Content-Type', 'text/csv');

        return $response;
    }
}
