<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\SignInFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * {@inheritDoc}
 */
class SignInController extends AbstractController
{
    #[Route('/sign-in', methods: ['GET', 'POST'], name: 'sign-in')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->getSession()->get('user_id')) {
            return $this->redirectToRoute('app_front_index');
        }

        $form = $this->createForm(SignInFormType::class);
        $form->handleRequest($request);
        $passwordVerified = true;

        $resultMessages = [];

        if ($form->isSubmitted() && $form->isValid()) {

            $username = $form->getData()['username'];
            $password = $form->getData()['password'];

            $user = $entityManager->getRepository(User::class)->findOneBy(['username' => $username]);

            if ($user) {
                $passwordVerified = password_verify($password, $user->getPassword());

                if ($passwordVerified && $user->getApprovedAt()) {

                    $request->getSession()->set('user_id', $user->getId());

                    return $this->redirectToRoute('app_front_index');
                }
            } else {
                $passwordVerified = false;
            }

            if (!$user->getApprovedAt()) {
                $resultMessages[] = 'User is not yet approved, please try again later.';
            }
        }

        if (!$passwordVerified) {
            $resultMessages[] = "Username/Password combination is wrong.";
        }

        return $this->render('sign-in.html', [
            'form' => $form,
            'resultMessages' => $resultMessages,
        ]);
    }
}
