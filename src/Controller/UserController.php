<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\SignUpFormType;
use App\Form\UserType;
use DateTimeImmutable;
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
class UserController extends AbstractController
{
    #[Route('/admin/users', methods: ['GET'], name: 'users')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('users.html', ['user' => $user, 'users' => $users]);
    }


    #[Route('/user/create', methods: ['GET', 'POST'], name: 'user_create')]
    public function create(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $response = $httpClient->request(
            'GET',
            'https://countriesnow.space/api/v0.1/countries'
        );

        $countriesData = $response->toArray();

        $response = $httpClient->request(
            'POST',
            'https://countriesnow.space/api/v0.1/countries/cities',
            ['body' => ['country' => 'greece']]
        );

        $citiesData = $response->toArray();

        foreach ($citiesData['data'] as $city) {
            $cities[$city] = $city;
        }

        $countries = [];

        foreach ($countriesData['data'] as $countryData) {
            $countries[$countryData['country']] = $countryData['country'];
        }

        $formUser = new User();

        $form = $this->createForm(SignUpFormType::class, $formUser);

        $form->add('country', ChoiceType::class, [
            'choices'  => $countries,
        ]);

        $form->add('city', ChoiceType::class, [
            'choices'  => $cities,
        ]);

        $form->add('role', ChoiceType::class, [
            'choices'  => ['admin' => 'admin', 'simple' => 'simple'],
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formUser->setApprovedAt(new DateTimeImmutable());

            $entityManager->persist($formUser);
            $entityManager->flush();

            return $this->redirectToRoute('users');
        }

        return $this->render('create-user.html', ['user' => $user, 'form' => $form]);
    }

    #[Route('/user/edit/{userId}', methods: ['GET', 'POST'], name: 'user_edit')]
    public function update(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        $params = $request->attributes->get('_route_params');

        $dbUserId = $params['userId'];

        $dbUser = $entityManager->getRepository(User::class)->find($dbUserId);

        $response = $httpClient->request(
            'GET',
            'https://countriesnow.space/api/v0.1/countries'
        );

        $countriesData = $response->toArray();

        $response = $httpClient->request(
            'POST',
            'https://countriesnow.space/api/v0.1/countries/cities',
            ['body' => ['country' => 'greece']]
        );

        $citiesData = $response->toArray();

        foreach ($citiesData['data'] as $city) {
            $cities[$city] = $city;
        }

        $countries = [];

        foreach ($countriesData['data'] as $countryData) {
            $countries[$countryData['country']] = $countryData['country'];
        }

        $form = $this->createForm(UserType::class, $dbUser);

        $form->add('country', ChoiceType::class, [
            'choices'  => $countries,
        ]);

        $form->add('city', ChoiceType::class, [
            'choices'  => $cities,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('users');
        } else {
        }

        return $this->render('edit-user.html', ['dbUser' => $dbUser, 'user' => $user, 'form' => $form]);
    }

    #[Route('/user/delete/{userId}', methods: ['DELETE'], name: 'user_delete')]
    public function delete(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $response = new Response();

        $params = $request->attributes->get('_route_params');

        $errors = [];

        $userId = $params['userId'];

        $user = $entityManager->getRepository(User::class)->find($userId);

        $entityManager->remove($user);

        $entityManager->flush();

        return $response->setContent(json_encode(['errors' => $errors]));
    }

    #[Route('/user/approve/{userId}', methods: ['POST'], name: 'user_approve')]
    public function approve(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        $response = new Response();

        $params = $request->attributes->get('_route_params');

        $errors = [];

        $userId = $params['userId'];

        $user = $entityManager->getRepository(User::class)->find($userId);

        $user->setApprovedAt(new DateTimeImmutable());

        $entityManager->flush();

        return $response->setContent(json_encode(['errors' => $errors]));
    }
}
