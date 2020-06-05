<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sport;
use App\Entity\Liga;
use App\Entity\Tim;
use App\Entity\Igrac;
use App\Entity\Utakmica;
use App\Entity\StatistikaUtakmice;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DelegatController extends AbstractController
{
  
    /**
     * @Route("/sport/utakmica/unesiStatistikuUtakmice/{id}/{ids}/{idd}/{idg}", name="unos_statistike", methods={"GET","POST"})
     */
    public function unesiPocetnuStatisiku(Request $request,$id,$ids,$idd,$idg)
    {
        if (!$this->isGranted('ROLE_DELEGAT', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         $sport=$this->getDoctrine()->getRepository(Sport::class)->find($ids);
         $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
         $domaci=$this->getDoctrine()->getRepository(Tim::class)->find($idd);
         $gosti=$this->getDoctrine()->getRepository(Tim::class)->find($idg);
       
            $igraciD=$domaci->getIgrac();
            $igraciG=$gosti->getIgrac();
            
  

        $form=$this->createFormBuilder()
        ->add('BrojGolovaDomaci',NumberType::class,[
            'label'=>$domaci->getNaziv(),
            'attr'=>[
                'class'=>'form-control'
            ]
        ])
        ->add('BrojGolovaGosti',NumberType::class,[
            'label'=>$gosti->getNaziv(),
            'attr'=>[
                'class'=>'form-control'
            ]
        ])
        ->add('Register',SubmitType::class,[
            'label'=>'Spremi Statistiku Utakmice',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
   
        ->getForm();

            
            $form->handleRequest($request);
            $data=$form->getData();
            
      
           

            if($form->isSubmitted() && $form->isValid()){
               
      
            
            

                
                   
                    
                $domaci->setBrojPogodaka($domaci->getBrojPogodaka()+$data['BrojGolovaDomaci']);
                $gosti->setBrojPogodaka( $gosti->getBrojPogodaka()+$data['BrojGolovaGosti']);
                $domaci->setBrojPrimljenih($domaci->getBrojPrimljenih()+$data['BrojGolovaGosti']);
                $gosti->setBrojPrimljenih( $gosti->getBrojPrimljenih()+$data['BrojGolovaDomaci']);
                $domaci->setOdigraneutakmice($domaci->getOdigraneutakmice()+1);
                $gosti->setOdigraneutakmice( $gosti->getOdigraneutakmice()+1);
                if($data['BrojGolovaDomaci']<$data['BrojGolovaGosti']){
                    $domaci->setBrojPoraza($domaci->getBrojPoraza()+1);
                    $gosti->setBrojPobjeda( $gosti->getBrojPobjeda()+1);
                    $gosti->setBodovi($gosti->getBodovi()+3);

                  
                    

    
                      
                    


                }else if($data['BrojGolovaDomaci']>$data['BrojGolovaGosti']){
                    $gosti->setBrojPoraza( $gosti->getBrojPoraza()+1);
                    $domaci->setBrojPobjeda($domaci->getBrojPobjeda()+1);
                    $domaci->setBodovi($domaci->getBodovi()+3);
                 

                }else if($data['BrojGolovaDomaci']==$data['BrojGolovaGosti']){
                    $domaci->setBrojRemija($domaci->getBrojRemija()+1);
                    $gosti->setBrojRemija( $gosti->getBrojRemija()+1);
                    $gosti->setBodovi($gosti->getBodovi()+1);
                    $domaci->setBodovi($domaci->getBodovi()+1);
               
                }
             


                $statistika=new StatistikaUtakmice;
                $statistika->setDelegat($this->getUser());
                $statistika->setBrojGolovaDomaci($data['BrojGolovaDomaci']);
                $statistika->setBrojGolovaGosti($data['BrojGolovaGosti']);
                $statistika->setUtakmica($utakmica);

             
                foreach($igraciD as $igrac){
                
                    $igrac->setBrojOdigranihUtakmica($igrac->getBrojOdigranihUtakmica()+1);
                    if($data['BrojGolovaDomaci']<$data['BrojGolovaGosti']){
                        $igrac->setBrojPoraza($igrac->getBrojPoraza()+1);
                    }else if($data['BrojGolovaDomaci']>$data['BrojGolovaGosti']){
                        $igrac->setBrojPobjeda($igrac->getBrojPobjeda()+1);
                    }else if($data['BrojGolovaDomaci']==$data['BrojGolovaGosti']){
                        $igrac->setBrojRemija($igrac->getBrojRemija()+1);

                    }
                    $entityManager=$this->getDoctrine()->getManager();
                    $entityManager->persist($igrac);
                    $entityManager->flush();


                
                }
            
                foreach($igraciG as $igrac){
                
                    $igrac->setBrojOdigranihUtakmica($igrac->getBrojOdigranihUtakmica()+1);

                    if($data['BrojGolovaDomaci']<$data['BrojGolovaGosti']){
                        $igrac->setBrojPobjeda($igrac->getBrojPobjeda()+1);
                    }else if($data['BrojGolovaDomaci']>$data['BrojGolovaGosti']){
                        $igrac->setBrojPoraza($igrac->getBrojPoraza()+1);
                    }else if($data['BrojGolovaDomaci']==$data['BrojGolovaGosti']){
                        $igrac->setBrojRemija($igrac->getBrojRemija()+1);

                    }

                    $entityManager=$this->getDoctrine()->getManager();
                    $entityManager->persist($igrac);
                    $entityManager->flush();

                
                }

               
                    try{
               
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($statistika);
                $entityManager->flush();

                $em=$this->getDoctrine()->getManager();
                $em->persist( $domaci);
                $em->flush();
                $en=$this->getDoctrine()->getManager();
                $en->persist(  $gosti);
                $en>flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('utakmica_prikaz_detalji',[
                    'id'=>$id,
                    'idd'=>$idd,
                    'idg'=>$idg
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Greska');
               
            }

        
            }

            return $this->render('delegat/unesiStatistikaUtakmice.html.twig',[
                
                'form'=> $form->createView(),
                'igraciD'=>$igraciD,
                'igraciG'=>$igraciG,
                'domaci'=>$domaci,
                'gosti'=>$gosti,
                'sport'=>$sport
            ]);

    }


      
    /**
     * @Route("/sport/utakmica/urediStatistikuUtakmice/{id}/{ids}/{idd}/{idg}", name="uredi_statistike", methods={"GET","POST"})
     */
    public function urediPocetnuStatisiku(Request $request,$id,$ids,$idd,$idg)
    {
        if (!$this->isGranted('ROLE_DELEGAT', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         $statistika=$this->getDoctrine()->getRepository(StatistikaUtakmice::class)->find($ids);
         $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
         $domaci=$this->getDoctrine()->getRepository(Tim::class)->find($idd);
         $gosti=$this->getDoctrine()->getRepository(Tim::class)->find($idg);
        
       
        
         $d=$statistika->getBrojGolovaDomaci();
         $g=$statistika->getBrojGolovaGosti();

        $form=$this->createFormBuilder($statistika)
        ->add('BrojGolovaDomaci',NumberType::class,[
            'label'=>$domaci->getNaziv(),
            'attr'=>[
                'class'=>'form-control'
            ]
        ])
        ->add('BrojGolovaGosti',NumberType::class,[
            'label'=>$gosti->getNaziv(),
            'attr'=>[
                'class'=>'form-control'
            ]
        ])
        ->add('Register',SubmitType::class,[
            'label'=>'Uredi Statistiku Utakmice',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
   
        ->getForm();
  
            
            $form->handleRequest($request);
            $data['BrojGolovaDomaci']=$statistika->getBrojGolovaDomaci();
            $data['BrojGolovaGosti']=$statistika->getBrojGolovaGosti(); 

            if($form->isSubmitted() && $form->isValid()){
               
              
                // if($d == $data['BrojGolovaDomaci'] && $g == $data['BrojGolovaGosti'] )
                // {
                //     return $this->redirectToRoute('utakmica_prikaz_detalji',[
                //         'id'=>$id,
                //         'idd'=>$idd,
                //         'idg'=>$idg
                //     ]);

                // }else 
                // if($d!=$data['BrojGolovaDomaci'] || $g != $data['BrojGolovaGosti']){
                    $domaci->setBrojPogodaka($domaci->getBrojPogodaka()- $d);
                    $gosti->setBrojPogodaka( $gosti->getBrojPogodaka()- $g);
                    $domaci->setBrojPrimljenih($domaci->getBrojPrimljenih()- $g);
                    $gosti->setBrojPrimljenih( $gosti->getBrojPrimljenih()- $d);

                    if($d < $g){
                        $domaci->setBrojPoraza($domaci->getBrojPoraza()-1);
                        $gosti->setBrojPobjeda( $gosti->getBrojPobjeda()-1);
                        $gosti->setBodovi($gosti->getBodovi()-3);
    
                    }else if($d>$g){
                        $gosti->setBrojPoraza( $gosti->getBrojPoraza()-1);
                        $domaci->setBrojPobjeda($domaci->getBrojPobjeda()-1);
                        $domaci->setBodovi($domaci->getBodovi()-3);
    
                    }else if($d==$g){
                        $domaci->setBrojRemija($domaci->getBrojRemija()-1);
                        $gosti->setBrojRemija( $gosti->getBrojRemija()-1);
                        $gosti->setBodovi($gosti->getBodovi()-1);
                        $domaci->setBodovi($domaci->getBodovi()-1);
    
                    }



                $domaci->setBrojPogodaka($domaci->getBrojPogodaka()+$data['BrojGolovaDomaci']);
                $gosti->setBrojPogodaka( $gosti->getBrojPogodaka()+$data['BrojGolovaGosti']);
                $domaci->setBrojPrimljenih($domaci->getBrojPrimljenih()+$data['BrojGolovaGosti']);
                $gosti->setBrojPrimljenih( $gosti->getBrojPrimljenih()+$data['BrojGolovaDomaci']);
               



                if($data['BrojGolovaDomaci']<$data['BrojGolovaGosti']){
                    $domaci->setBrojPoraza($domaci->getBrojPoraza()+1);
                    $gosti->setBrojPobjeda( $gosti->getBrojPobjeda()+1);
                    $gosti->setBodovi($gosti->getBodovi()+3);

                }else if($data['BrojGolovaDomaci']>$data['BrojGolovaGosti']){
                    $gosti->setBrojPoraza( $gosti->getBrojPoraza()+1);
                    $domaci->setBrojPobjeda($domaci->getBrojPobjeda()+1);
                    $domaci->setBodovi($domaci->getBodovi()+3);

                }else if($data['BrojGolovaDomaci']==$data['BrojGolovaGosti']){
                    $domaci->setBrojRemija($domaci->getBrojRemija()+1);
                    $gosti->setBrojRemija( $gosti->getBrojRemija()+1);
                    $gosti->setBodovi($gosti->getBodovi()+1);
                    $domaci->setBodovi($domaci->getBodovi()+1);

                }


                $statistika=new StatistikaUtakmice;
                $statistika->setDelegat($this->getUser());
                $statistika->setBrojGolovaDomaci($data['BrojGolovaDomaci']);
                $statistika->setBrojGolovaGosti($data['BrojGolovaGosti']);
                $statistika->setUtakmica($utakmica);



            
                    try{
               
                $entityManager=$this->getDoctrine()->getManager();
       
                $entityManager->flush();

                $em=$this->getDoctrine()->getManager();
                $em->persist( $domaci);
                $em->flush();
                $en=$this->getDoctrine()->getManager();
                $en->persist(  $gosti);
                $en>flush();
                    
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('utakmica_prikaz_detalji',[
                    'id'=>$id,
                    'idd'=>$idd,
                    'idg'=>$idg
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Greska');
               
            }
        }


        
            // }

            return $this->render('delegat/urediStatistikaUtakmice.html.twig',[
                
                'form'=> $form->createView(),
               
                'domaci'=>$domaci,
                'gosti'=>$gosti
               
            ]);

    }


    

  /**
     * @Route("/sport/utakmica/unesiStatistikuUtakmicePojedinacni/{id}/{idd}/{idg}", name="unos_statistike_pojedinacni", methods={"GET","POST"})
     */
    public function unesiPocetnuStatisikuPojedinacni(Request $request,$id,$idd,$idg)
    {
        if (!$this->isGranted('ROLE_DELEGAT', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         
         $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
         $domaci=$this->getDoctrine()->getRepository(Igrac::class)->find($idd);
         $gosti=$this->getDoctrine()->getRepository(Igrac::class)->find($idg);
       
           
            
  

        $form=$this->createFormBuilder()
        ->add('BrojGolovaDomaci',NumberType::class,[
            'label'=>$domaci->getIme(),
            
            'attr'=>[
                'class'=>'form-control',
                'placeholder'=>'Gem',
            ]
        ])
        ->add('BrojGolovaGosti',NumberType::class,[
            'label'=>$gosti->getPrezime(),
            'attr'=>[
                'class'=>'form-control',
                'placeholder'=>'Gem',
            ]
        ])
        ->add('Register',SubmitType::class,[
            'label'=>'Spremi Statistiku Utakmice',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
   
        ->getForm();

            
            $form->handleRequest($request);
            $data=$form->getData();
            
      
           

            if($form->isSubmitted() && $form->isValid()){
               
            
                $domaci->setBrojPogodaka($domaci->getBrojPogodaka()+$data['BrojGolovaDomaci']);
                $gosti->setBrojPogodaka( $gosti->getBrojPogodaka()+$data['BrojGolovaGosti']);
               
                $domaci->setBrojOdigranihUtakmica($domaci->getBrojOdigranihUtakmica()+1);
                $gosti->setBrojOdigranihUtakmica( $gosti->getBrojOdigranihUtakmica()+1);
                if($data['BrojGolovaDomaci']<$data['BrojGolovaGosti']){
                    $domaci->setBrojPoraza($domaci->getBrojPoraza()+1);
                    $gosti->setBrojPobjeda( $gosti->getBrojPobjeda()+1);
              

                }else if($data['BrojGolovaDomaci']>$data['BrojGolovaGosti']){
                    $gosti->setBrojPoraza( $gosti->getBrojPoraza()+1);
                    $domaci->setBrojPobjeda($domaci->getBrojPobjeda()+1);
              

                }
             


                $statistika=new StatistikaUtakmice;
                $statistika->setDelegat($this->getUser());
                $statistika->setBrojGolovaDomaci($data['BrojGolovaDomaci']);
                $statistika->setBrojGolovaGosti($data['BrojGolovaGosti']);
                $statistika->setUtakmica($utakmica);



               
                    try{
               
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($statistika);
                $entityManager->flush();

                $em=$this->getDoctrine()->getManager();
                $em->persist( $domaci);
                $em->flush();
                $en=$this->getDoctrine()->getManager();
                $en->persist(  $gosti);
                $en>flush();
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('utakmica_prikaz_detalji_p',[
                    'id'=>$id,
                    'idd'=>$idd,
                    'idg'=>$idg
                ]);
                 }catch(\Exception $e){
                $this->addFlash('error', 'Greska');
               
            }

        
            }

            return $this->render('delegat/unesiStatistikaUtakmice.html.twig',[
                
                'form'=> $form->createView(),
             
                'domaci'=>$domaci,
                'gosti'=>$gosti
           
            ]);

    }


    

    /**
     * @Route("/sport/utakmica/unesiStatistikuIgraca/{id}/{ids}/{idig}/{idT}", name="unos_sstatistike", methods={"GET","POST"})
     */
    public function unesiStatisitkuIgraca(Request $request,$id,$ids,$idig,$idT)
    {
        if (!$this->isGranted('ROLE_DELEGAT', null)) {
            return  $this->redirectToRoute('sport_event');
             
         }

         $statistika=$this->getDoctrine()->getRepository(StatistikaUtakmice::class)->find($ids);
         $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
         $Tim=$this->getDoctrine()->getRepository(Tim::class)->find($idT);
         $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($idig);
        
         $igraciT=$Tim->getIgrac();
    
            
  

        $form=$this->createFormBuilder()
        ->add('brojPogodaka',NumberType::class,[
            'label'=>'Broj pogodaka',
           
            'attr'=>[
                'class'=>'form-control'
            ]
        ])
        ->add('brojAsistencija',NumberType::class,[
            'label'=>'Broj Asistencija',
            
            'attr'=>[
                'class'=>'form-control'
            ]
        ])
     
        ->add('Register',SubmitType::class,[
            'label'=>'Spremi Statistiku Igraca',
            'attr'=>[
                'class'=>'btn btn-success float-right'
            ]
        ])
        
   
        ->getForm();

            
            $form->handleRequest($request);
            $data=$form->getData();
            
      
           

            if($form->isSubmitted() && $form->isValid()){
           
                if($data['brojPogodaka'] <= $Tim->getBrojPogodaka()){
                    $igrac->setBrojPogodaka($igrac->getBrojPogodaka()+$data['brojPogodaka']);

                    $igrac->setBrojAsistencija($igrac->getBrojAsistencija()+$data['brojAsistencija']);
            
                }


               
                    try{
                        $entityManager=$this->getDoctrine()->getManager();
                        $entityManager->persist($igrac);
                        $entityManager->flush();
             
                $this->addFlash('success', 'Success');
                return $this->redirectToRoute('sport_event');
                 }catch(\Exception $e){
                $this->addFlash('error', 'Greska');
               
            }

        
            }

            return $this->render('delegat/unesiStatistikuIgraca.html.twig',[
                
                'form'=> $form->createView(),
               
               'igrac'=>$igrac
            ]);

    }

}
