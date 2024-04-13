<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(Request $request, PersonneRepository $personneRepository): Response
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        if (empty($email) || empty($password)) {
            $this->addFlash('error', 'Please enter both email and password.');
            return $this->redirectToRoute('login_page'); 
        }

        /** @var Personne|null $user */
        $user = $personneRepository->findOneBy(['email' => $email]);

        if (!$user) {
            $this->addFlash('error', 'Invalid email or password. Please try again.');
            return $this->redirectToRoute('login_page');
        }

        if (!hash_equals($user->getPassword(), hash('sha256', $password))) {
            $this->addFlash('error', 'Invalid email or password. Please try again.');
            return $this->redirectToRoute('login_page');
        }

        if ($email === 'amenallah.laouini@esprit.tn' && $password === '1234') {
            return $this->redirectToRoute('app_test');
        } else {
            return $this->redirectToRoute('user_dashboard');
        }
    }
}
