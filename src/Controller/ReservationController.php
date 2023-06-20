<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 * {@inheritDoc}
 */
class ReservationController extends AbstractController
{
    #[Route('/reservation', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('base.html', []);
    }
}
