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

class SportEventController extends AbstractController
{
    /**
     * @Route("/", name="sport_event")
     */
    public function index()
    {
        $sport=$this->getDoctrine()->getRepository(Sport::class)->findAll();
        $liga=$this->getDoctrine()->getRepository(Liga::class)->findAll();



        return $this->render('sport_event/index.html.twig',[
            'sports'=> $sport,
            'lige'=>$liga
        ]);
    }

       /**
     * @Route("/sport/Liga/{id}", name="sport_liga")
     */
    public function PrikazLige($id)
    {
        $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
        
       $igracLiga=$liga->getIgrac();
        $timLiga=$liga->getTim();
      
        for($i=0; $i<count($timLiga); $i++){
            for($j=0; $j<count($timLiga); $j++){
                if($timLiga[$i]->getBodovi() > $timLiga[$j]->getBodovi()){
                    $temp=$timLiga[$i];
                    $timLiga[$i]=$timLiga[$j];
                    $timLiga[$j]=$temp;
                }


            }


        }

        for($i=0; $i<count($igracLiga); $i++){
            for($j=0; $j<count($igracLiga); $j++){
                if($igracLiga[$i]->getBrojPobjeda() > $igracLiga[$j]->getBrojPobjeda()){
                    $temp=$igracLiga[$i];
                    $igracLiga[$i]=$igracLiga[$j];
                    $igracLiga[$j]=$temp;
                }


            }


        }


    

        return $this->render('sport_event/liga.html.twig',[
            'liga'=>$liga,
           'igracLiga'=>$igracLiga,
            'timLiga'=>$timLiga
        ]);
    }

          /**
     * @Route("/sport/tim/{id}/{idl}", name="sport_tim")
     */
    public function PrikazTima($id,$idl)
    {
        $tim=$this->getDoctrine()->getRepository(Tim::class)->find($id);
        $liga=$this->getDoctrine()->getRepository(Liga::class)->find($idl);
        $igrac=$tim->getIgrac();
 
       
    

        return $this->render('sport_event/tim.html.twig',[
            'tim'=>$tim,
            'igraci'=>$igrac,
            'idl'=>$idl,
            'liga'=>$liga
            
        ]);
    }

          /**
     * @Route("/sport/tim/prikaziIgraca/{id}/{idt}/{idl}", name="sport_tim_igrac_prikaz")
     */
    public function PrikazIgracaTim($id,$idt,$idl)
    {
        $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($id);
        	$tim=$this->getDoctrine()->getRepository(Tim::class)->find($idt);
 

    

        return $this->render('sport_event/igrac.html.twig',[
            
            'igrac'=>$igrac,
            'tim'=>$tim,
            'idl'=>$idl
        ]);
    }

      /**
     * @Route("/sport/Liga/{id}/prikazUtakmica", name="utakmica_prikaz")
     */
    public function PrikazUtakmica($id)
    {
        $liga=$this->getDoctrine()->getRepository(Liga::class)->find($id);
        
        $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->findAll();
        $statistike=$this->getDoctrine()->getRepository(StatistikaUtakmice::class)->findAll();

        return $this->render('sport_event/utakmica.html.twig',[
            
            'liga'=>$liga,
            'utakmice'=>$utakmica,
            'statistike'=>$statistike
        ]);
    }
    
  
 /**
     * @Route("/sport/detaljiutakmice/{id}/{idd}/{idg}", name="utakmica_prikaz_detalji")
     */
    public function PrikazUtakmicaDetalji($id,$idd,$idg)
    {
       
        $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
        $domaci=$this->getDoctrine()->getRepository(Tim::class)->find($idd);
        $gosti=$this->getDoctrine()->getRepository(Tim::class)->find($idg);
        $statistika=$this->getDoctrine()->getRepository(StatistikaUtakmice::class)->findAll();
        $igraciD=$domaci->getIgrac();
        $igraciG=$gosti->getIgrac();
        $uredi=false;
        $urediIg=false;
        foreach($statistika as $stat){
            if($utakmica == $stat->getUtakmica()){
                $uredi=true;
                
            }
        }

     

        return $this->render('sport_event/utakmicaDetalji.html.twig',[
            
           
            'utakmica'=>$utakmica,
            'igracD'=> $igraciD,
            'igracG'=> $igraciG,
            'statistika'=>$statistika,
            'uredi'=>$uredi
        ]);
    }


   

     /**
     * @Route("/sport/detaljiutakmicePojedinacni/{id}/{idd}/{idg}", name="utakmica_prikaz_detalji_p")
     */
    public function PrikazUtakmicaDetaljiPojedinacni($id,$idd,$idg)
    {
       
        $utakmica=$this->getDoctrine()->getRepository(Utakmica::class)->find($id);
        $domaci=$this->getDoctrine()->getRepository(Igrac::class)->find($idd);
        $gosti=$this->getDoctrine()->getRepository(Igrac::class)->find($idg);
        $statistika=$this->getDoctrine()->getRepository(StatistikaUtakmice::class)->findAll();
     
        $uredi=false;
 
        foreach($statistika as $stat){
            if($utakmica == $stat->getUtakmica()){
                $uredi=true;
                
            }
        }

        return $this->render('sport_event/utakmicaDetaljiPojedinacni.html.twig',[
            
           
            'utakmica'=>$utakmica,
            'statistika'=>$statistika,
            'uredi'=>$uredi
        ]);
    }


        /**
     * @Route("/sport/tim/prikaziIgracaP/{id}/{idt}", name="sport_pojedinacni_igrac_prikaz")
     */
    public function PrikazIgracaPojeedinacni($id,$idt)
    {
        $igrac=$this->getDoctrine()->getRepository(Igrac::class)->find($id);
        	$liga=$this->getDoctrine()->getRepository(Liga::class)->find($idt);
 

    

        return $this->render('sport_event/igracPojedinacni.html.twig',[
            
            'igrac'=>$igrac,
            'liga'=>$liga
        ]);
    }

}
