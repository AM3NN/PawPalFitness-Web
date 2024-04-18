<?php

namespace App\Controller\Reservation;

use App\Entity\Cart;
use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/planning', name: 'planning')]
    public function planning(ReservationRepository $reservationRepository): Response
    {
        // Fetch reservations from the database
        $reservations = $reservationRepository->findAll();

        // Organize reservations by category
        $reservationsByCategory = [];
        foreach ($reservations as $reservation) {
            $category = $reservation->getCategory(); // Assuming getCategory() returns the category of the reservation
            if (!isset($reservationsByCategory[$category])) {
                $reservationsByCategory[$category] = [];
            }
            $reservationsByCategory[$category][] = $reservation;
        }

        // Render the template with reservations organized by category
        return $this->render('reservation/reservation.html.twig', [
            'reservationsByCategory' => $reservationsByCategory,
        ]);
    }

    




    
   /* #[Route('/add-to-cart/{id}', name: 'add_to_cart')]
    public function addToCart(Reservation $reservation): Response
    {
        // Create a new Cart item
        $cartItem = new Cart();
        $cartItem->setReservation($reservation);
        // Set other details like places, quantity, timestamp, etc. as needed

        // Get the EntityManager
        $entityManager = $this->getDoctrine()->getManager();
        
        // Persist the Cart item
        $entityManager->persist($cartItem);
        $entityManager->flush();

        // Redirect back to the reservation page or wherever appropriate
        return $this->redirectToRoute('planning');
    }*/


}
