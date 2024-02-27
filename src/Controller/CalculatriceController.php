<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalculatriceController extends AbstractController
{
    #[Route('/calculatrice/{nb1}/{nb2}/{operateur}', name: 'app_calculatrice')]
    public function index($nb1,$nb2,$operateur): Response
    {
        try {
            !is_numeric($nb1) || !is_numeric($nb2)?throw new \Exception('Les variables $nb1 et $nb2 ne sont pas des nombres'):null;
            switch ($operateur) {
                case 'add':
                    $resultat = $nb1 + $nb2;
                    break;
                case 'sub':
                    $resultat = $nb1 - $nb2;
                    break;
                case 'div':
                    $nb2 == 0?throw new \Exception("la division par zéro est impossible"):null;
                    $resultat = $nb1 / $nb2;
                    break;
                case 'multi':
                    $resultat = $nb1 * $nb2;
                    break;
                default:
                    $resultat = "L'opérateur n'est pas valide";
                    break;
            }
        } 
        catch (\Throwable $th) {
            $resultat = $th->getMessage();
        }
        
        return $this->render('calculatrice/index.html.twig',[
            'nb1' => $nb1,
            'nb2' => $nb2,
            'operateur' => $operateur,
            'resultat' => $resultat
        ]);
    }
}
