<?php

namespace App\Controller;

use App\Entity\Score;
use App\Repository\ControlsRepository;
use App\Repository\GameRepository;
use App\Repository\ScoreRepository;
use App\Repository\UserRepository;
use App\Repository\WeaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    /**
     * @Route("/scores", name="scoresMenu")
     */
    public function scoreMenu(GameRepository $gameRepo): Response
    {
        $games = $gameRepo->findAll();
        return $this->render('scores/scoreBoard.html.twig', [
            'controller_name' => 'ScoreController',
            'games' => $games
        ]);
    }

    /**
     * @Route("/getScores", name="getScores")
     */
    public function getScores(Request $request, GameRepository $gameRepo, ScoreRepository $scoreRepo): Response
    {
        $gameId = $request->get('gameIdChoosed');
        $game = $gameRepo->find($gameId);
        $scores = $scoreRepo->findBy(array("game"=>$gameId),array("points"=>"desc"));
        return $this->render('scores/_tableScores.html.twig', [
            'controller_name' => 'ScoreController',
            'scores' => $scores,
            'game' => $game
        ]);
    }

    /**
     * @Route("/addScore", name="addScore")
     */
    public function addScore(Request $request, GameRepository $gameRepo, ScoreRepository $scoreRepo, WeaponRepository $weaponRepo, ControlsRepository $controlsRepo, UserRepository $userRepo): Response
    {

        $params = array(
            "game" => $request->get('game'),
            "user" => $request->get('user'),
            "weapon" => $request->get('weapon'),
            "controls" => $request->get('controls'),
            "points" => $request->get('score')
        );

        $score = new Score();
        $score->setGame($gameRepo->find($params['game']));
        $score->setUser($userRepo->find($params['user']));
        $score->setWeapon($weaponRepo->findOneBy(array("name"=>$params['weapon'])));
        $score->setControls($controlsRepo->findOneBy(array("name"=>$params['controls'])));
        $score->setPoints($params['points']);
        
        //gedmo ne marche pas donc...



        $em = $this->getDoctrine()->getManager();
        $em->persist($score);
        $em->flush();
        
        return new JsonResponse(
            array(
                "message"=>"ajout score réussi"
            ),
            200
        );
    }

}
