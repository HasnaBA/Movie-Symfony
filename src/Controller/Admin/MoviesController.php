<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Movies;
use App\Form\MoviesType;


class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="admin_movies_add")
     */
    public function add( Request $request)
    {   
        $movie = new Movies;
        
       
        $form = $this->createForm(MoviesType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $movie= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($movie);
            $entityManager->flush();
            // redirects to the "edit" route
            return $this->redirectToRoute('admin_movies_edit',[
                'id' => $movie->getId(),
            ] );

        }

        return $this->render('admin/movies/add.html.twig', [
            
            'form' => $form->createView(),

        ]);
    }

    /**
     * @Route("/edit/{id}", name="admin_movies_edit")
     */

    public function edit( Request $request, $id)
    {   
        $movie = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->find($id);
        $form = $this->createForm(MoviesType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $movie= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($movie);
            $entityManager->flush();

            $this->addFlash('success', 'Movie Created!');
            // redirects to the "movies" route
            return $this->redirectToRoute('movies');

        }

        return $this->render('admin/movies/edit.html.twig', [
            
            'form' => $form->createView(),

        ]);
    }
}
