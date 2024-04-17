<?php

namespace App\Controller\Reservation;

use App\Entity\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        // Retrieve cart items from the database or session
        $cartItems = $this->entityManager->getRepository(Cart::class)->findAll(); // Adjust this according to your data retrieval method

        return $this->render('reservation/cart.html.twig', [
            'cartItems' => $cartItems,
        ]);
    }
}
