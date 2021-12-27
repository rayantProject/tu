<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserTest1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class Test5Controller extends AbstractController
{
    // c'est comme ca on creer un form avc le controller grace a la methode add qui recupere
    // les proprietes de l éntity passé par exemple ici avec name
    #[Route('/test5', name: 'test5')]
    public function index()
    {

        $user = new User;
        $form = $this->createFormBuilder($user)
        ->add('name')
        ->add('email')
        ->getForm();
        return $this->render('test5/index.html.twig',['userForm' => $form->createView()]);
    }

    #[Route('/test5/type', name: 'test5Type')]

    public function index2(Request $request)
    {
        $user = new User;
        $form = $this->createFormBuilder($user)
        ->add('name', TextType::class)
        ->add('email', EmailType::class)
        ->add('numero', NumberType::class)
        ->add('save', SubmitType::class)
        ->getForm();
        // demander a form d'inspecter objet request
    $form->handleRequest($request);


        // return $this->render('test5/index.html.twig',['userForm' => $form->createView()]);

        //condition du form


        if($form->isSubmitted() && $form->isValid()){
            return new Response('formulaire is valid');

        }

        return $this->render('test5/index.html.twig',['userform' => $form->createView()]);
    }
    
//route vers la class form
    #[Route('/test5/classForm', name: 'test5Type')]

    public function index3(Request $request)
    {
        //on appele la class usertestype
        //et on creer une nouvelle entité user
        $user = new User;
        $form = $this->createForm(UserTest1Type::class, $user);
        // demander a form d'inspecter objet request
    $form->handleRequest($request);


        // return $this->render('test5/index.html.twig',['userForm' => $form->createView()]);

        //condition du form


        if($form->isSubmitted() && $form->isValid()){
            return new Response('formulaire is valid');

        }

        return $this->render('test5/index.html.twig',['userform' => $form->createView()]);
    }
    }

