<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class StarWarsController extends AbstractController
{

    /**
     * @Route("/menuStar", name="menuStar")
     */
    public function starMenu(Request $request): Response
    {
        $params = array(
            "stepMenu" => $request->get('stepMenu'),
            "controls" => $request->get('controls'),
            "weapons" => $request->get('weapons')
        );
        
        switch($params['stepMenu']){
            case '1':
                $pathView = 'gameStar/menu/_menuControls.html.twig';
                break;
            case '2':
                $pathView = 'gameStar/menu/_menuWeapons.html.twig';
                break;
            case '3':
                $pathView = 'gameStar/menu/_menuReady.html.twig';
                break;
            default:
                $pathView = 'gameStar/menu/menuStar.html.twig';
        }
        return $this->render($pathView, [
            'controller_name' => 'StarWarsController',
            'controls'=> $params['controls'],
            'weapons'=> $params['weapons']        
        ]);

    }


    /**
     * @Route("/gameStar", name="gameStar")
     */
    public function startGame(Request $request): Response
    {
        
        $params = array(
            "controls" => $request->get('controls'),
            "weapons" => $request->get('weapons')
        );


        return $this->render('gameStar/game/roomStar.html.twig', [
            'controller_name' => 'StarController',
            'controls'=> $params['controls'],
            'weapons'=> $params['weapons']
        ]);

    }

}
