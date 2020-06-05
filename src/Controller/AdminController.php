<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Korisnik;
use Doctrine\ORM\EntityManager;
class AdminController extends AbstractController
{
    /**
     * @Route("/admin/users", name="admin")
     */
    public function showUsers()
    {
     
        if (!$this->isGranted('ROLE_ADMIN', null)) {
           return  $this->redirectToRoute('sport_event');
            
        }
        $users=$this->getDoctrine()->getRepository(Korisnik::class)->findAll();


        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);
    }

    /**
 * @Route("/sport/deleteAdmin/{id}",  methods={"GET","POST"})
 */

public function deleteAdmin($id){

    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);

    $user-> setRoles([]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
    $response->send();

}

    /**
 * @Route("/sport/addAdmin/{id}", methods={"GET","POST"})
 */
public function addAdmin($id){
    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);
    $user-> setRoles(["ROLE_ADMIN"]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
 $response->send();

}


    /**
 * @Route("/sport/deleteEditor/{id}",  methods={"GET","POST"})
 */

public function deleteEditor($id){

    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);

    $user-> setRoles([]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
    $response->send();

}

    /**
 * @Route("/sport/addEditor/{id}", methods={"GET","POST"})
 */
public function addEditor($id){
    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);
    $user-> setRoles(["ROLE_EDITOR"]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
 $response->send();

}


    /**
 * @Route("/sport/deleteDelegat/{id}",  methods={"GET","POST"})
 */

public function deleteDelegat($id){

    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);

    $user-> setRoles([]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
    $response->send();

}

    /**
 * @Route("/sport/addDelegat/{id}", methods={"GET","POST"})
 */
public function addDelegat($id){
    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);
    $user-> setRoles(["ROLE_DELEGAT"]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
 $response->send();

}


    /**
 * @Route("/sport/deleteRadnik/{id}",  methods={"GET","POST"})
 */

public function deleteRadnik($id){

    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);

    $user-> setRoles([]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
    $response->send();

}

    /**
 * @Route("/sport/addRadnik/{id}", methods={"GET","POST"})
 */
public function addRadnik($id){
    $user=$this->getDoctrine()->getRepository(Korisnik::class)->find($id);
    $user-> setRoles(["ROLE_RADNIK"]);

    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($user);
    $entityManager->flush();

    $response=new Response();
 $response->send();

}

}
