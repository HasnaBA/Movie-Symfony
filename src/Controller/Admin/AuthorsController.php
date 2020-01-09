<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Authors;
use App\Form\AuthorsType;


class AuthorsController extends AbstractController
{
    /**
     * @Route("/authors", name="admin_authors_add")
     */
    public function add( Request $request)
    {   
        $author = new Authors;
        
       
        $form = $this->createForm(AuthorsType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $author= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($author);
            $entityManager->flush();
        }

        return $this->render('admin/authors/add.html.twig', [
            
            'form' => $form->createView(),

        ]);
    }
}
