<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdditionController extends AbstractController
{
    #[Route('/addition/{nb1}/{nb2}', name: 'app_addition')]
    public function index($nb1,$nb2): Response
    {
        $res = $nb1 + $nb2;

        return $this->render('addition/index.html.twig', [
            'resultat' => $res,
        ]);
    }
}
