<?php

namespace App\Controller\ReservationBack;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ResBackController extends AbstractController
{
    #[Route('/show', name: 'app_display')]
    public function index(ReservationRepository $reservationRepository): Response
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

        return $this->render('reservation/displayRes.html.twig', [
            'reservationsByCategory' => $reservationsByCategory,
        ]);
    }

    #[Route('/add', name: 'app_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();
    
            // Redirect to the appropriate route after successful form submission
            return $this->redirectToRoute('app_display', [], Response::HTTP_SEE_OTHER);
        }
    
        // Render the form template with the form object
        return $this->render('reservation/add.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);

}


#[Route('/edit/{id}', name: 'app_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(ReservationType::class, $reservation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // If the form is submitted and valid, flush changes to the database
        $entityManager->flush();

        // Redirect to the display page after editing
        return $this->redirectToRoute('app_display', [], Response::HTTP_SEE_OTHER);
    }

    // If the request is POST, manually update the Reservation entity
    if ($request->isMethod('POST')) {
        $reservation->setPlaces($request->request->get('places'));
        $reservation->setCategory($request->request->get('category'));
        $reservation->setDate($request->request->get('date'));
        $reservation->setStarttime($request->request->get('startTime'));
        $reservation->setEndtime($request->request->get('endTime'));
        $reservation->setStatus($request->request->get('status'));
        $reservation->setDuration($request->request->get('duration'));
        $reservation->setPricing($request->request->get('pricing'));

        
    }

    // Render the edit form template with the reservation entity and form
    return $this->render('reservation/edit.html.twig', [
        'reservation' => $reservation,
        'form' => $form->createView(), // Pass the form view to the template
    ]);
}


#[Route('/delete/{id}', name: 'app_delete', methods: ['POST'])]
public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
{
    // Validate CSRF token
    if ($this->isCsrfTokenValid('delete'.$reservation->getReservationId(), $request->request->get('_token'))) {
        $entityManager->remove($reservation);
        $entityManager->flush();

        // Redirect back to the reservation display page after deletion
        return $this->redirectToRoute('app_display');
    }

    // If CSRF token is not valid, handle the error as needed
    // For example, you can redirect back to the display page with an error message
    return $this->redirectToRoute('app_display', ['error' => 'Invalid CSRF token']);
}



}