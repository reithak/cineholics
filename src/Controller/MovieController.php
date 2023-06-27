<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Reservation;
use App\Entity\Seat;
use App\Entity\User;
use App\Form\MovieType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * {@inheritDoc}
 */
class MovieController extends AbstractController
{
    #[Route('/movies', methods: ['GET'], name: 'movies')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $movies = $entityManager->getRepository(Movie::class)->findAll();

        $count = 0;

        $moviesPerRow = [];

        $moviesData = [];

        foreach ($movies as $movie) {
            if ($count % 5 === 0) {
                $count = 0;
                $moviesData[] = $moviesPerRow;
                $moviesPerRow = [];
            }

            $moviesPerRow[] = $movie;
            $count++;
        }

        if ($moviesPerRow) {
            $moviesData[] = $moviesPerRow;
        }

        return $this->render('movies.html', ['moviesData' => $moviesData, 'user' => $user]);
    }

    #[Route('/movies/fetch', methods: ['GET'], name: 'movies_fetch')]
    public function fetch(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $movieEntityClass = Movie::class;
        $seatEntityClass = Seat::class;

        $result = $entityManager->createQuery("DELETE FROM {$movieEntityClass}")->getResult();

        $result = $entityManager->createQuery("DELETE FROM {$seatEntityClass}")->getResult();

        $response = new Response();

        $moviesResponse = $httpClient->request(
            'GET',
            'https://api.themoviedb.org/3/movie/now_playing?language=en-US&page=1&api_key=41e8e70285a505d31464e98cbe343d74'
        );

        $moviesData = $moviesResponse->toArray();

        foreach ($moviesData['results'] as $movieData) {
            $movieId = $movieData['id'];

            $movieDetailsResponse = $httpClient->request(
                'GET',
                "https://api.themoviedb.org/3/movie/{$movieId}?api_key=41e8e70285a505d31464e98cbe343d74",
            );

            $moviesData = $moviesResponse->toArray();
            $movieDetails = $movieDetailsResponse->toArray();

            $movie = new Movie();

            $releaseDate = DateTime::createFromFormat('Y-m-d', $movieDetails['release_date']);

            $movie
                ->setName($movieData['original_title'])
                ->setDescription($movieData['overview'])
                ->setDirector('Unknown')
                ->setRating($movieData['vote_average'])
                ->setDurationInMinutes($movieDetails['runtime'])
                ->setYear($releaseDate->format('Y'))
                ->setGenre($movieDetails['genres']['0']['name'])
                ->setImageUrlId($movieData['poster_path'])
                ->setPrice(7);

            $entityManager->persist($movie);

            foreach (range(1, 50) as $seatNumber) {
                $seat = new Seat();

                $seat->addMovie($movie)->setAvailable(true)->setSeatNumber((string)$seatNumber);

                $entityManager->persist($seat);
            }
        }

        $entityManager->flush();

        return $response->setContent(json_encode([]));
    }

    #[Route('/movies/edit/{movieId}', methods: ['GET', 'POST'], name: 'movies_edit')]
    public function update(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $params = $request->attributes->get('_route_params');

        $moviedId = $params['movieId'];

        $movie = $entityManager->getRepository(Movie::class)->find($moviedId);

        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formMovie = $form->getData();

            $entityManager->persist($formMovie);
            $entityManager->flush();

            return $this->redirectToRoute('movies');
        } else {
        }

        return $this->render('edit-movie.html', ['movie' => $movie, 'user' => $user, 'form' => $form]);
    }

    #[Route('/movies/delete/{movieId}', methods: ['DELETE'], name: 'movies_delete')]
    public function delete(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $response = new Response();

        $params = $request->attributes->get('_route_params');

        $errors = [];

        $moviedId = $params['movieId'];

        $movie = $entityManager->getRepository(Movie::class)->find($moviedId);

        $reservation = $entityManager->getRepository(Reservation::class)->findOneBy(['movie' => $moviedId]);

        if ($reservation) {
            $errors[] = 'You cannot delete this because there are reservations for this movie!';
        } else {
            $entityManager->remove($movie);

            $entityManager->flush();
        }

        return $response->setContent(json_encode(['errors' => $errors]));
    }
}
