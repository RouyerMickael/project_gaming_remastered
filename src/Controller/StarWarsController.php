<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StarWarsController extends AbstractController
{
    /**
     * @Route("/gameStar", name="starMenu")
     */
    public function starMenu(): Response
    {
        return $this->render('gameStar/game/roomStar.html.twig', [
            'controller_name' => 'StarWarsController',
        ]);
    }
}
