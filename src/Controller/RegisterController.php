<?php

namespace App\Controller;
use App\Entity\Korisnik;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/sport/register", name="register_conrtroller", methods={"GET","POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $passEncoder)
    {
        $form=$this->createFormBuilder(['attr'=> ['class'=>'formaReg']])
        ->add('ime',TextType::class,[
            'attr'=>[
                'class'=>'form-control ime'
            ]
        ])
        ->add('prezime',TextType::class,[
            'attr'=>[
                'class'=>'form-control prezime'
            ]
        ])
        ->add('username',TextType::class,[
            'attr'=>[
                'class'=>'form-control uname'
            ]
        ])
        ->add('email',EmailType::class,[
            'attr'=>[
                'class'=>'form-control email'
            ]
        ])
        ->add('password',RepeatedType::class,[
            'type'=> PasswordType::class,
            'required'=>true,
            'first_options'=>['label'=>'Password'],
            'second_options'=>['label'=>'Confirm Password'],
            'attr'=>[
                'class'=>'form-control '
            ]
        ])
      
        ->add('Register',SubmitType::class,[
            'label'=>'Register',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);
            
            if($form->isSubmitted() && $form->isValid()){
                $user=new Korisnik;

                $data=$form->getData();

                $user->setIme($data['ime']);
                $user->setPrezime($data['prezime']);
                $user->setUsername($data['username']);
                $user->setEmail($data['email']);
                $user->setPassword(
                    $passEncoder->encodePassword($user,$data['password'])
                    );

                    try{
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_event');
                 }catch(\Exception $e){
                $this->addFlash('error', 'Username or email are used');
               
            }


            }
                


        return $this->render('register/register.html.twig',[
            'form'=> $form->createView()
        ]);
    }

}
