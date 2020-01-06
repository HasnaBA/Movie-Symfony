<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index()
    {

        $movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->findBy([], ['name' => 'ASC'], 50);

       

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }
    
    /**
     * @Route("/movie/{id}", name="movie")
     */
    public function movie($id)
    {

        $movie = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->find($id);


       

        return $this->render('movies/movie.html.twig', [
            'movie' => $movie,
        ]);
    }
}