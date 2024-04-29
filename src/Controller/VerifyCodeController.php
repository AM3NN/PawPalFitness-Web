<?php

namespace App\Controller;

use App\Entity\VerificationCodes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerifyCodeController extends AbstractController
{
    #[Route('/verify/code', name: 'app_verify_code')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Check if there is an error message passed as a query parameter
        $error = $request->query->get('error');
    
        // Render the verification code input form and pass the error variable to the template
        return $this->render('verify_code/index.html.twig', [
            'error' => $error
        ]);
    }
    
    #[Route('/verify/code/check', name: 'app_verify_code_check', methods: ['POST'])]
    public function check(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Get the verification code from the form submission
        $code = $request->request->get('code');
    
        // Find the verification code entity in the database
        $verificationCode = $entityManager->getRepository(VerificationCodes::class)->findOneBy(['code' => $code]);
    
        // If verification code is found
        if ($verificationCode) {
            // Retrieve the email associated with the verification code
            $email = $verificationCode->getEmail();
    
            // Delete the verification code from the database
            $entityManager->remove($verificationCode);
            $entityManager->flush();
    
            // Redirect to the reset password page and pass the email as a query parameter
            return $this->redirectToRoute('app_reset_password', ['email' => $email]);
        } else {
            // Set a flash message to display the error
            $this->addFlash('error', 'Invalid verification code.');
    
            // Redirect back to the verification code input form
            return $this->redirectToRoute('app_verify_code', ['error' => true]);
        }
    }
    
}
