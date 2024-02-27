<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AfficherNomController extends AbstractController
{
    #[Route('/afficher/nom/{nom}', name: 'app_afficher_nom')]
    public function index($nom): Response
    {
        return $this->render('afficher_nom/index.html.twig', [
            'controller_name' => $nom,
        ]);
    }
}
