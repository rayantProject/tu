<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//  abstractController 
// fournit des methodes exterieut ou helper methods qui permettent 
// rendu template
// redirection
// gestion des erreurs
class Test3Controller extends AbstractController
{
    //  Test3Controller herite de abstractController
    #[Route('/test3/testRender', name: 'testRender')]
    public function testRender(): Response


    {
        // render renvoie une vue twig passé en argument
        return $this->render('test3/index.html.twig', [
            'controller_name' => 'Test3Controller',
            // tableau assiociatif qui remplace la variable controller_name par Test3Controller
        ]);
    }

    #[Route('/test3/testRedirection', name: 'testRedirection')]
    public function testRedirection(): Response
    {
        // permet de rediriger ver une route
        return $this->redirectToRoute('/');
    }


//renvoie un truc quand quelques choses dans la BD n'est pas trouver par exemple
    /**
     * @Route("/test3/erreur", name="erreur")
     */
    public function testPasTrouver(): Response
    {
        throw $this->createNotFoundException();
    }
}
