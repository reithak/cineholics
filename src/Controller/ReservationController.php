<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Reservation;
use App\Entity\Seat;
use App\Entity\User;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

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

        if ($user && $user->getRole() === 'admin') {
            $reservations = $entityManager->getRepository(Reservation::class)->findAll();
        } else {
            $reservations = $user ? $user->getReservations() : [];
        }

        return $this->render('reservations.html', ['user' => $user, 'reservations' => $reservations]);
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

        $availableSeats = $entityManager->getRepository(Seat::class)
            ->createQueryBuilder('seat')
            ->join('seat.movie', 'movie')
            ->where('movie = :movie')
            ->andWhere('seat.available = :available')
            ->setParameter('movie', $movie)
            ->setParameter('available', true)
            ->getQuery()
            ->getResult();

        $form = $this->createForm(ReservationType::class, $reservation, [
            'entityManager' => $entityManager,
            'availableSeats' => $availableSeats,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();

            $reservation->setPrice(($reservation->getLastSeatNumber() - $reservation->getFirstSeatNumber() + 1) * $movie->getPrice());
            $reservation->setStatus('active');
            $reservation->setMovie($movie);
            $reservation->addUser($user);

            $seatNumbers = range($reservation->getFirstSeatNumber(), $reservation->getLastSeatNumber());

            $seats = $entityManager->getRepository(Seat::class)
                ->createQueryBuilder('seat')
                ->join('seat.movie', 'movie')
                ->where('movie = :movie')
                ->andWhere('seat.seat_number IN (:seat_numbers)')
                ->setParameter('movie', $movie)
                ->setParameter('seat_numbers', $seatNumbers)
                ->getQuery()
                ->getResult();

            foreach ($seats as $seat) {
                $seat->setAvailable(false);
            }

            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservations');
        }

        return $this->render('book-movie.html', ['movie' => $movie, 'user' => $user, 'form' => $form, 'availableSeats' => $availableSeats]);
    }

    #[Route('/reservation/edit/{reservationId}', methods: ['GET', 'POST'], name: 'reservation_edit')]
    public function update(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $params = $request->attributes->get('_route_params');

        $reservationId = $params['reservationId'];

        $reservation = $entityManager->getRepository(Reservation::class)->find($reservationId);

        $movie = $reservation->getMovie();

        $availableSeats = $entityManager->getRepository(Seat::class)
            ->createQueryBuilder('seat')
            ->join('seat.movie', 'movie')
            ->where('movie = :movie')
            ->andWhere('seat.available = :available')
            ->setParameter('movie', $movie)
            ->setParameter('available', true)
            ->getQuery()
            ->getResult();

        $form = $this->createForm(ReservationType::class, $reservation, [
            'entityManager' => $entityManager,
            'availableSeats' => $availableSeats,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formMovie = $form->getData();

            $reservation->setPrice(($reservation->getLastSeatNumber() - $reservation->getFirstSeatNumber() + 1) * $movie->getPrice());

            $entityManager->persist($formMovie);
            $entityManager->flush();

            return $this->redirectToRoute('reservations');
        } else {
        }

        return $this->render('edit-reservation.html', ['reservation' => $reservation, 'user' => $user, 'form' => $form, 'movie' => $movie]);
    }

    #[Route('/reservation/delete/{reservationId}', methods: ['DELETE'], name: 'reservation_delete')]
    public function delete(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $response = new Response();

        $params = $request->attributes->get('_route_params');

        $errors = [];

        $reservationId = $params['reservationId'];

        $reservation = $entityManager->getRepository(Reservation::class)->find($reservationId);

        $entityManager->remove($reservation);

        $entityManager->flush();

        return $response->setContent(json_encode(['errors' => $errors]));
    }

    #[Route('/reservation/cancel/{reservationId}', methods: ['POST'], name: 'reservation_cancel')]
    public function cancel(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $response = new Response();

        $params = $request->attributes->get('_route_params');

        $errors = [];

        $reservationId = $params['reservationId'];

        $reservation = $entityManager->getRepository(Reservation::class)->find($reservationId);

        $reservation->setStatus('cancelled');

        $entityManager->flush();

        return $response->setContent(json_encode(['errors' => $errors]));
    }
}
