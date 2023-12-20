<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StarWarsController extends AbstractController
{
    /**
     * @Route("/gameStar", name="swIndex")
     */
    public function swIndex(): Response
    {
        return $this->render('gameStar/indexStar.html.twig', [
            'controller_name' => 'StarWarsController',
        ]);
    }
}
