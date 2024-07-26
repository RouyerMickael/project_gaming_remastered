<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeigneurController extends AbstractController
{
    /**
     * @Route("/gameSeigneur", name="seigneurMenu")
     */
    public function seigneurMenu(): Response
    {
        return $this->render('gameSeigneur/game/roomSeigneur.html.twig', [
            'controller_name' => 'SeigneurController',
        ]);
    }
}
