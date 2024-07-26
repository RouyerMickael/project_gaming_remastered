<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{

    /**
     * @Route("/login", name="user_login")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response    {
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        //un utilisateur déjà connecté n'a pas à revenir ici
        if($this->getUser()){
            return $this->redirectToRoute('home');
        }
        
        return $this->render('user/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,        
        ]);
    }


    /**
     * @Route("/logout", name="user_logout")
     */
    public function logout(){}

}