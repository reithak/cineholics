<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\SignUpFormType;
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
class SignUpController extends AbstractController
{
    #[Route('/sign-up', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, HttpClientInterface $httpClient): Response
    {
        if ($request->getSession()->get('user_id')) {
            return $this->redirectToRoute('app_front_index');
        }

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

        $user = new User();
        $form = $this->createForm(SignUpFormType::class, $user);

        $countries = [];

        foreach ($countriesData['data'] as $countryData) {
            $countries[$countryData['country']] = $countryData['country'];
        }

        $form->add('country', ChoiceType::class, [
            'choices'  => $countries,
        ]);

        $form->add('city', ChoiceType::class, [
            'choices'  => $cities,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRole('simple');

            $formUser = $form->getData();

            $user->setPassword(password_hash($formUser->getPassword(), PASSWORD_BCRYPT));

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('sign-in');
        }

        return $this->render('sign-up.html', [
            'form' => $form,
        ]);
    }
}
