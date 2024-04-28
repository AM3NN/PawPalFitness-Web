<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personne;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UpdateProfileController extends AbstractController
{
    private $entityManager;
    private $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    #[Route('/update/profile/{id}', name: 'app_update_profile')]
    public function index(Request $request, int $id): Response
    {
        $user = $this->entityManager->find(Personne::class, $id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        $errors = [];

        // Handle form submission
        if ($request->isMethod('POST')) {
            $user->setNom($request->request->get('nom'));
            $user->setPrenom($request->request->get('prenom'));
            $user->setEmail($request->request->get('email'));
            $user->setRegion($request->request->get('region'));
            $user->setAge($request->request->get('age'));

            // Validate the user entity
            $validationErrors = $this->validator->validate($user);

            // If there are validation errors, add them to the $errors array
            if (count($validationErrors) > 0) {
                foreach ($validationErrors as $error) {
                    $errors[$error->getPropertyPath()] = $error->getMessage();
                }
            } else {
                // If no validation errors, persist the changes and redirect
                $this->entityManager->flush();
                return $this->redirectToRoute('app_profile', ['id' => $user->getId()]);
            }
        }

        // Render the form for updating user information
        return $this->render('update_profile/index.html.twig', [
            'controller_name' => 'UpdateProfileController',
            'user' => $user,
            'errors' => $errors, // Pass validation errors to the template
        ]);
    }
}
