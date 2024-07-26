<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    /**
     * @Route("/scores", name="scoresMenu")
     */
    public function scoreMenu(): Response
    {
        return $this->render('scores/scoreBoard.html.twig', [
            'controller_name' => 'ScoreController',
        ]);
    }
}
