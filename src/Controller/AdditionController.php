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
        try {
            !is_numeric($nbr1) || !is_numeric($nbr2)?throw new \Exception('Les variables $nbr1 et $nbr2 ne sont pas des nombres'):null;
            switch ($operateur) {
                case 'add':
                    $resultat = $nbr1 + $nbr2;
                    break;
                case 'sub':
                    $resultat = $nbr1 - $nbr2;
                    break;
                case 'div':
                    $nbr2 == 0?throw new \Exception("la division par zéro est impossible"):null;
                    $resultat = $nbr1 / $nbr2;
                    break;
                case 'multi':
                    $resultat = $nbr1 * $nbr2;
                    break;
                default:
                    $resultat = "L'opérateur n'est pas valide";
                    break;
            }
        } 
        catch (\Throwable $th) {
            $resultat = $th->getMessage();
        }
        
        return $this->render('exercice/calculatrice.html.twig',[
            'nbr1' => $nbr1,
            'nbr2' => $nbr2,
            'operateur' => $operateur,
            'resultat' => $resultat
        ]);
    }
}
