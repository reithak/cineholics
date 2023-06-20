<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * {@inheritDoc}
 */
class UserController extends AbstractController
{
    #[Route('/admin/users', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userId = $request->getSession()->get('user_id');

        $user = $userId ? $entityManager->getRepository(User::class)->find($userId) : null;

        return $this->render('users.html', ['user' => $user]);
    }
}
