<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sport;
use App\Entity\Liga;
use App\Entity\Tim;
use App\Entity\Igrac;
use App\Entity\Utakmica;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EditorController extends AbstractController
{
      /**
     * @Route("/sport/dodaj", name="dodaj_sport", methods={"GET","POST"})
     */
    public function dodajSport(Request $request){

        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

        $form=$this->createFormBuilder(['attr'=> ['class'=>'formaSport']])
        ->add('naziv',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('BrojIgraca',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('tip',ChoiceType::class,[
            'choices'  => [
            
                'Timski sport' => true,
                'Pojedinacni sport' => false,
            ]
        ])

        ->add('Register',SubmitType::class,[
            'label'=>'Dodaj Sport',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $sport=new Sport;

                $data=$form->getData();

               $sport->setNaziv($data['naziv']);
               $sport->setBrojIgraca($data['BrojIgraca']);
               $sport->setTip($data['tip']);

                    try{
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($sport);
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_event');
                 }catch(\Exception $e){
                $this->addFlash('error', 'Sport je vec unesen');
               
            }


            }

            return $this->render('editor/dodajSport.html.twig',[
                'form'=> $form->createView()
            ]);

    }

      /**
     * @Route("/sport/edit/{id}", name="edit_sport" , methods={"GET","POST"})
     */
    public function editSport(Request $request,$id){

        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }
         $sport=$this->getDoctrine()->getRepository(Sport::class)->find($id);

        $form=$this->createFormBuilder($sport)
        ->add('naziv',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('BrojIgraca',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('tip',ChoiceType::class,[
            'choices'  => [
            
                'Timski sport' => true,
                'Pojedinacni sport' => false,
            ]
        ])
        ->add('Register',SubmitType::class,[
            'label'=>'Edit Sport',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
              

                    try{
                $entityManager=$this->getDoctrine()->getManager();
           
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_event');
                 }catch(\Exception $e){
                $this->addFlash('error', 'Sport je vec unesen');
               
            }


            }

            return $this->render('editor/editSport.html.twig',[
                'form'=> $form->createView()
            ]);

    }

        /**
 * @Route("/sport/deleteSport/{id}",  methods={"DELETE"})
 */

public function deleteSport($id){

    
    if (!$this->isGranted('ROLE_EDITOR', null)) {
        return  $this->redirectToRoute('sport_event');
         
     }
    $sport=$this->getDoctrine()->getRepository(Sport::class)->find($id);


    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->remove($sport);
    $entityManager->flush();

    $response=new Response();
    $response->send();

}



//Liga


 /**
     * @Route("/sport/dodajLigu/{id}", name="dodaj_ligu", methods={"GET","POST"})
     */
    public function dodajLigu(Request $request,$id){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

        $form=$this->createFormBuilder(['attr'=> ['class'=>'formaLiga']])
        ->add('naziv',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
      
        ->add('Register',SubmitType::class,[
            'label'=>'Dodaj Ligu',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $liga=new Liga;
                $sport=$this->getDoctrine()->getRepository(Sport::class)->find($id);
                $data=$form->getData();

               $liga->setNaziv($data['naziv']);
               $liga->setSport($sport);

                    try{
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($liga);
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_event');
                 }catch(\Exception $e){
                $this->addFlash('error', 'Liga vec postoji');
               
            }


            }

            return $this->render('editor/dodajLigu.html.twig',[
                'form'=> $form->createView()
            ]);

    }

    /**
     * @Route("/sport/editLiga/{id}", name="edit_liga", methods={"GET","POST"})
     */
    public function editLiga(Request $request,$id){

        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }
         $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);

        $form=$this->createFormBuilder($liga)
        ->add('naziv',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])

        ->add('Register',SubmitType::class,[
            'label'=>'Edit Liga',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
               

                    try{
                $entityManager=$this->getDoctrine()->getManager();
               
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_event');
                 }catch(\Exception $e){
                $this->addFlash('error', 'Liga vec postoji');
               
            }


            }

            return $this->render('editor/editLiga.html.twig',[
                'form'=> $form->createView()
            ]);

    }

            /**
 * @Route("/sport/deleteLiga/{id}",  methods={"DELETE"})
 */

public function deleteLiga($id){

    
    if (!$this->isGranted('ROLE_EDITOR', null)) {
        return  $this->redirectToRoute('sport_event');
         
     }
    $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);


    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->remove($liga);
    $entityManager->flush();

    $response=new Response();
    $response->send();

}


//Tim
    //          /**
    //  * @Route("/sport/dodajTimShow/{id}", name="ShowDodaj_tim")
    //  */
    // public function ShowDodajTim($id)
    // {

    //     if (!$this->isGranted('ROLE_EDITOR', null)) {
    //         return  $this->redirectToRoute('sport_event');
             
    //      }
    //      $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
        
       
    //      $Tim=$liga->getTim();

       
       

    //     return $this->render('editor/dodajTim.html.twig',[
    //         'timLiga'=>$Tim,
    //         'liga'=>$liga
    //     ]);
    // }
  

    //       /**
    //  * @Route("/sport/dodajTim/{id}", name="dodaj_tim", methods={"GET","POST"})
    //  */
    // public function dodajTim($id)
    // {

    //     if (!$this->isGranted('ROLE_EDITOR', null)) {
    //         return  $this->redirectToRoute('sport_event');
             
    //      }
    //      $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
        
       
    //      $tim=new Tim;

    //      $tim->addLiga($liga);

    //      try{
    //         $entityManager=$this->getDoctrine()->getManager();
    //         $entityManager->persist($tim);
    //         $entityManager->flush();
    //         $this->addFlash('success', 'Success');
    //         return $this->redirectToRoute('sport_event');
    //          }catch(\Exception $e){
    //         $this->addFlash('error', 'Tim Postoji');
           
    //     }
       

    //     return $this->render('editor/dodajTim.html.twig',[
    //         'timLiga'=>$Tim,
    //         'liga'=>$liga
    //     ]);
    // }

   

 /**
      * @Route("/sport/dodajTim/{id}", name="dodaj_tim", methods={"GET","POST"})
     */
    public function dodajTim(Request $request,$id){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         

        $form=$this->createFormBuilder(['attr'=> ['class'=>'formaLiga']])
        ->add('naziv',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        
        ->add('NazivMjesta',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
      
        ->add('Register',SubmitType::class,[
            'label'=>'Dodaj Tim',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $tim=new Tim;
                $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
                $data=$form->getData();

               $tim->setNaziv($data['naziv']);
               $tim->setNazivMjesta($data['NazivMjesta']);
               $tim->setOdigraneutakmice(0);
               $tim->setBrojPobjeda(0);
               $tim->setBrojPoraza(0);
               $tim->setBrojRemija(0);
               $tim->setBrojPogodaka(0);
               $tim->setBrojPrimljenih(0);
               $tim->setBodovi(0);

               $tim->addLiga($liga);

                    try{
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($tim);
                
                // napraviutakmicu
               
                $timovi=$liga->getTim();
               
                   foreach($timovi as $timo){
                    $utakmica=new Utakmica;
                      $utakmica->setDomaci($tim);
                      $utakmica->setGosti($timo);
                      $utakmica->setLiga($liga);
                      
                      $entityManager=$this->getDoctrine()->getManager();
                      $entityManager->persist($utakmica);
                      $entityManager->flush();
                   }
                   foreach($timovi as $timo){
                    $utakmica=new Utakmica;
                      $utakmica->setDomaci($timo);
                      $utakmica->setGosti($tim);
                      $utakmica->setLiga($liga);
                    
                      $entityManager=$this->getDoctrine()->getManager();
                      $entityManager->persist($utakmica);
                      $entityManager->flush();
                   }
                   $entityManager->flush();
        
                
                $this->addFlash('success', 'Success');

                return $this->redirectToRoute('sport_liga',[
                    'id'=>$id
                ]);
                
                 }catch(\Exception $e){
                $this->addFlash('error', 'Tim Postoji');
               
            }


            }

            return $this->render('editor/dodajNoviTim.html.twig',[
                'form'=> $form->createView()
            ]);

    }




     /**
     * @Route("/sport/urediTim/{id}/{idL}", name="uredi_tim", methods={"GET","POST"})
     */
    public function urediTim(Request $request,$id,$idL){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         $tim=$this->getDoctrine()->getRepository(Tim::class)->find($id);

        $form=$this->createFormBuilder($tim)
        ->add('naziv',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('Bodovi',TextType::class,[
            'attr'=>[
                'class'=>'form-control bod'
            ]
        ])
        ->add('Odigraneutakmice',TextType::class,[
            'attr'=>[
                'class'=>'form-control '
            ]
        ])
        ->add('BrojPoraza',TextType::class,[
            'attr'=>[
                'class'=>'form-control '
            ]
        ])
        ->add('BrojPobjeda',TextType::class,[
            'attr'=>[
                'class'=>'form-control '
            ]
        ])
        ->add('BrojRemija',TextType::class,[
            'attr'=>[
                'class'=>'form-control '
            ]
        ])
        ->add('NazivMjesta',TextType::class,[
            'attr'=>[
                'class'=>'form-control '
            ]
        ])
    
      
        ->add('Register',SubmitType::class,[
            'label'=>'Uredi Tim',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
               

                    try{
                $entityManager=$this->getDoctrine()->getManager();
              
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_liga',[
                    'id'=>$idL
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Tim vec postoji');
               
            }


            }

            return $this->render('editor/urediTim.html.twig',[
                'form'=> $form->createView()
            ]);

    }

               /**
 * @Route("/sport/obrisiTim/{idt}/izLige/{idl}",  methods={"DELETE"})
 */

public function obrisiTim($idt,$idl){

    
    if (!$this->isGranted('ROLE_EDITOR', null)) {
        return  $this->redirectToRoute('sport_event');
         
     }
     $em=$this->getDoctrine()->getManager();
     $tim=$this->getDoctrine()->getRepository(Tim::class)->find($idt);
     $liga=$this->getDoctrine()->getRepository(Liga::class)->find($idl);
     $tim->removeLiga($liga);
     
     $em->persist($tim);
         $em->flush();
         $response=new Response();
     $response->send();
    
    $response=new Response();
    $response->send();

}


//Igrac

    //        /**
    //  * @Route("/sport/dodajIgracaShow/{id}", name="ShowDodaj_igraca")
    //  */
    // public function ShowDodajIgracaP($id)
    // {

    //     if (!$this->isGranted('ROLE_EDITOR', null)) {
    //         return  $this->redirectToRoute('sport_event');
             
    //      }
    //      $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
        
       
    //      $igrac=$liga->getIgrac();

       
       

    //     return $this->render('editor/dodajIgracaP.html.twig',[
    //         'igracLiga'=>$igrac,
    //         'liga'=>$liga
    //     ]);
    // }

/**
     * @Route("/sport/dodajIgracaP/{id}", name="dodajnovog_igraca", methods={"GET","POST"})
     */
    public function dodajnovogIgracaP(Request $request,$id){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         

        $form=$this->createFormBuilder(['attr'=> ['class'=>'formaLiga']])
        ->add('ime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        
        ->add('prezime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('godine',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
        ->add('visina',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
    
      
        ->add('Register',SubmitType::class,[
            'label'=>'Dodaj Igraca u Ligu',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $igrac=new Igrac;
                $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
                $data=$form->getData();

               $igrac->setIme($data['ime']);
               $igrac->setPrezime($data['prezime']);
               $igrac->setGodine($data['godine']);
               $igrac->setVisina($data['visina']);
               $igrac->setBrojPobjeda(0);
               $igrac->setBrojPogodaka(0);
               $igrac->setBrojPoraza(0);
               $igrac->setBrojRemija(0);
               $igrac->setBrojOdigranihUtakmica(0);
               $igrac->setBrojAsistencija(0);

               $igrac->addLiga($liga);

                    try{
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($igrac);

                    // napraviutakmicu
                                
                    $igraci=$liga->getIgrac();
                                
                    foreach($igraci as $i){
                    $utakmica=new Utakmica;
                    $utakmica->setIgracD($igrac);
                    $utakmica->setIgracG($i);
                    $utakmica->setLiga($liga);
                    
                    $entityManager=$this->getDoctrine()->getManager();
                    $entityManager->persist($utakmica);
                    $entityManager->flush();
                    }
                    foreach($igraci as $i){
                    $utakmica=new Utakmica;
                    $utakmica->setIgracD($i);
                    $utakmica->setIgracG($igrac);
                    $utakmica->setLiga($liga);
                    
                    $entityManager=$this->getDoctrine()->getManager();
                    $entityManager->persist($utakmica);
                    $entityManager->flush();
                    }

                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_liga',[
                    'id'=>$id
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Unesi Pravilno');
               
            }


            }

            return $this->render('editor/dodajNovogIgracaP.html.twig',[
                'form'=> $form->createView()
            ]);

    }




     /**
     * @Route("/sport/urediIgraca/{id}/{idl}", name="uredi_igraca", methods={"GET","POST"})
     */
    public function urediIgraca(Request $request,$id,$idl){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($id);


         $form=$this->createFormBuilder($igrac)
        ->add('ime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        
        ->add('prezime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('godine',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
        ->add('visina',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
     

    
    
      
        ->add('Register',SubmitType::class,[
            'label'=>'Uredi Igraca',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
               

                    try{
                $entityManager=$this->getDoctrine()->getManager();
              
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_pojedinacni_igrac_prikaz',[
                    'id'=>$id,
                    'idt'=>$idl
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Igrac vec postoji');
               
            }


            }

            return $this->render('editor/urediIgraca.html.twig',[
                'form'=> $form->createView()
            ]);

    }

               /**
 * @Route("/sport/obrisiIgraca/{idi}/IzLige/{idl}",  methods={"DELETE"})
 */

public function obrisiIgracaIzLige($idi,$idl){

    
    if (!$this->isGranted('ROLE_EDITOR', null)) {
        return  $this->redirectToRoute('sport_event');
         
     }


$em=$this->getDoctrine()->getManager();
    $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($idi);
    $liga=$this->getDoctrine()->getRepository(Liga::class)->find($idl);
    $igrac->removeLiga($liga);
    
    $em->persist($igrac);
        $em->flush();
        $response=new Response();
    $response->send();
   
}



//Igrac za tim

/**
     * @Route("/sport/tim/dodajNovogIgraca/{id}/{idl}", name="dodajnovog_igraca_tim", methods={"GET","POST"})
     */
    public function dodajnovogIgracaTim(Request $request,$id,$idl){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         

        $form=$this->createFormBuilder(['attr'=> ['class'=>'formaLiga']])
        ->add('ime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        
        ->add('prezime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('godine',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
        ->add('visina',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
    
      
        ->add('Register',SubmitType::class,[
            'label'=>'Dodaj Igraca u Timu',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $igrac=new Igrac;
                $tim=$this->getDoctrine()->getRepository(Tim::class)->find($id);
                $data=$form->getData();

               $igrac->setIme($data['ime']);
               $igrac->setPrezime($data['prezime']);
               $igrac->setGodine($data['godine']);
               $igrac->setVisina($data['visina']);
               $igrac->setBrojPobjeda(0);
               $igrac->setBrojPogodaka(0);
               $igrac->setBrojPoraza(0);
               $igrac->setBrojRemija(0);
               $igrac->setBrojOdigranihUtakmica(0);
               $igrac->setBrojAsistencija(0);

               $igrac->addTim($tim);

                    try{
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($igrac);
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_tim',[
                    'id'=>$id,
                    'idl'=>$idl
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Igrac Posotoji');
               
            }


            }

            return $this->render('editor/dodajNovogIgracaP.html.twig',[
                'form'=> $form->createView()
            ]);

    }


    /**
     * @Route("/sport/tim/urediIgraca/{id}/{idt}/{idl}", name="uredi_igraca_tim", methods={"GET","POST"})
     */
    public function urediIgracaTim(Request $request,$id,$idt,$idl){


        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($id);

         $form=$this->createFormBuilder($igrac)
        ->add('ime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        
        ->add('prezime',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('godine',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
    
        ->add('visina',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
     

    
    
      
        ->add('Register',SubmitType::class,[
            'label'=>'Uredi Igraca',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
               

                    try{
                $entityManager=$this->getDoctrine()->getManager();
              
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_tim_igrac_prikaz',[
                    'id'=>$id,
                    'idt'=>$idt,
                    'idl'=>$idl
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Igrac vec postoji');
               
            }


            }

            return $this->render('editor/urediIgraca.html.twig',[
                'form'=> $form->createView()
            ]);

    }

             /**
 * @Route("/sport/obrisiIgraca/{idi}/IzTima/{idl}",  methods={"DELETE"})
 */

public function obrisiIgracaIzTima($idi,$idl){

    
    if (!$this->isGranted('ROLE_EDITOR', null)) {
        return  $this->redirectToRoute('sport_event');
         
     }


$em=$this->getDoctrine()->getManager();
    $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($idi);
    $tim=$this->getDoctrine()->getRepository(Tim::class)->find($idl);
    $igrac->removeTim($tim);
    
    $em->persist($igrac);
        $em->flush();
        $response=new Response();
    $response->send();
   
}

    //Utakmice

      /**
     * @Route("/sport/urediutakmica/{id}", name="uredi_utakmica", methods={"GET","POST"})
     */
    public function urediUtakmica(Request $request,$id){

        if (!$this->isGranted('ROLE_EDITOR', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }
         $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
         $liga=$utakmica->getLiga();

        $form=$this->createFormBuilder($utakmica)
        ->add('Mjesto',TextType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])
        ->add('Datum',DateType::class,[
            'attr'=>[
                'class'=>'form-control naziv'
            ]
        ])

        ->add('Register',SubmitType::class,[
            'label'=>'Uredi Utakmicu',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
               

                    try{
                $entityManager=$this->getDoctrine()->getManager();
               
                $entityManager->flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute("utakmica_prikaz",[
                    'id'=>$liga->getId()
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Greska');
               
            }


            }

            return $this->render('editor/urediUtakmicu.html.twig',[
                'form'=> $form->createView()
            ]);

    }




}
