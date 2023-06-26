<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Reservation;
use App\Entity\User;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * {@inheritDoc}
 */
class ReservationController extends AbstractController
{
    #[Route('/reservations', methods: ['GET'], name: 'reservations')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        return $this->render('reservations.html', ['user' => $user]);
    }

    #[Route('/book-movie/{movieId}', methods: ['GET', 'POST'], name: 'book-movie')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $params = $request->attributes->get('_route_params');

        $moviedId = $params['movieId'];

        $movie = $entityManager->getRepository(Movie::class)->find($moviedId);

        $reservation = new Reservation();

        $form = $this->createForm(ReservationType::class, $reservation);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();

            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservations');
        }

        return $this->render('book-movie.html', ['movie' => $movie, 'user' => $user, 'form' => $form]);
    }
}
