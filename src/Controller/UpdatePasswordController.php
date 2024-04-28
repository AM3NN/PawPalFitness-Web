<?php

namespace App\Controller;

use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UpdatePasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/update/password/{id}', name: 'app_update_password')]
    public function index(Request $request, int $id): Response
    {
        // Fetch the user by ID
        $user = $this->entityManager->getRepository(Personne::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        // Handle form submission
        if ($request->isMethod('POST')) {
            // Get submitted data
            $currentPassword = $request->request->get('current-password');
            $newPassword = $request->request->get('new-password');
            $confirmPassword = $request->request->get('confirm-password');

            // Validate new password
            if ($newPassword !== $confirmPassword) {
                // Passwords don't match, handle error (e.g., redirect with flash message)
                $this->addFlash('error', 'Passwords do not match');
                return $this->redirectToRoute('app_update_password', ['id' => $id]);
            }

            // Validate current password
            if (!$user->checkPassword($currentPassword)) {
                $this->addFlash('error', 'Invalid current password');
                return $this->redirectToRoute('app_update_password', ['id' => $id]);
            }

            // Set the new hashed password directly (already hashed in the entity)
            $user->setPassword($newPassword);

            $this->entityManager->flush();

            // Redirect with success message
            $this->addFlash('success', 'Password updated successfully');
            return $this->redirectToRoute('app_update_password', ['id' => $id]);
        }

        // Render the update password form
        return $this->render('update_password/index.html.twig', [
            'user' => $user,
        ]);
    }
}
