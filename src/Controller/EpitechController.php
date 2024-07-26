<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EpitechController extends AbstractController
{
    /**
     * @Route("/gameEpitech", name="epitechMenu")
     */
    public function epitechMenu(): Response
    {
        return $this->render('gameEpitech/game/roomEpitech.html.twig', [
            'controller_name' => 'EpitechController',
        ]);
    }
}
