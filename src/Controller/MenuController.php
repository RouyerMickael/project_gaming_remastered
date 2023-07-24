<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function menu(): Response
    {
        var_dump("coucou");
        die();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }



}
