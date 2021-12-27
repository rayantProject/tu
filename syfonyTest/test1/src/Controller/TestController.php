<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//jai utiliser du annot mais en comprennant on voit comment ca marche en yaml
class TestController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index()
    {
        dd('test1');
    }


    #[Route('/testController1', name: 'testController1')]
    public function go()
    {
        dd('testController1');
        
    }


    #[Route('/testRequest', name: 'testReques')]
    public function testRequest()


    {
    //on utiliser la classe request du componnant HttpFoundation 
    // createFromGlobals() est une methode static qui va permettre d'acceder au variables globales ($_GET, $_POST, $_SERVER...) 
        $request= Request::createFromGlobals();

        //on peut remplacer  $request= Request::createFromGlobals(); en ajoutant Request $request en param de la fonction : ...(Request $request){...}


        //je recupere nmbre dans l'url grace a la methode query, celle ci a par default la valeur 0: ...,0);
        $nmbre = $request->query->get('nmbre',0);
        dd("nmbre = $nmbre");

    }
    

    /**
     * @Route("/testReponse", name="testReponse")
     */
    public function testReponse(): Response
    {
        //on utiliser la classe request du componnant HttpFoundation 
    // createFromGlobals() est une methode static qui va permettre d'acceder au variables globales ($_GET, $_POST, $_SERVER...) 
    $request= Request::createFromGlobals();


    //je recupere nmbre dans l'url grace a la methode query, celle ci a par default la valeur 0: ...,0);
    $nmbre = $request->query->get('nmbre',0);

    //tout nos controller dont retourner une reponse http object classe reponse 
    return new Response("En utlisant objet reponse nmbr = $nmbre");
    }


//ajouter un parmettre a l'url et la retrouver dans une fct grace a attributes
// retrouver dans routes.yaml

    public function testParam(Request $request): Response

        // onpeut remplacer $param = $request->attributes->get('param'); en ajoutant param dans les () apres request : ...(Request $request, $param)
    {
        $param = $request->attributes->get('param');
        return new Response("$param");
    }

//vue que la methods specifie une post celle le lien ne chargera pas (charger une page c'est du GET)
    public function testContrainte(): Response
    {
        return new Response("testContrainte");
    }
//ce sont les contraine des autres test 

    public function testContrainte2(): Response
    {
        return new Response("testContrainte2");
    }

    public function testContrainte3(): Response
    {
        return new Response("testContrainte3");
    }

//imaginons on veut mettre une contrainte en annot

/**
 * @Route("/testContrainte4", name="testContrainte4", methods={"GET", "POST"}, schemes={"http", "https"})
 */
public function testContrainte4(): Response

{

    return new Response("testCONTRAINTE4");
}


}





// vardump() permet de creer un afficahge sur la page
// avec  dump() on peut le faire en mieux
// (a la fin il faut un die())
// mais on peut utiliser directement la fonct dd() qui nous permet de nous passer de die() 