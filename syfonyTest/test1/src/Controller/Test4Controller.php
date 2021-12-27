<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Test4Controller extends AbstractController
{
    //test sur la variable local de l'objet request
    //request possede une variable en local qui permet de définir la langue

    // pour modifier la var _local on peut utiliser un param speciale _local


    // il existe d'autre variable du mm genre (voir doc symfony)
    // il va actualiser la variable corresspondante dans l'objet request

    #[Route('/test4/param/{_locale}', name: 'test4')]


    public function index(Request $request):Response
    {
        $locale = $request->getLocale();
        return new Response("langue : $locale");
    }

    // on peut aussi passer au route un obj qui associant une langue et une url


    /**
     * @Route({"fr":"/test4/f", 
     *         "en":"/test4/e"})
     */
    public function FunctionName(Request $request): Response
    {
        $locale = $request->getLocale();
        return new Response("langue : $locale");
    }
}

