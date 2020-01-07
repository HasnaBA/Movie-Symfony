<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator

use App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $search = (string) $request->query->get('search', null);

        $movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->createQueryBuilder('m')
        ->where('m.name LIKE :name')
        ->setParameter('name', '%'.$search.'%')
        ->orderBy('m.name')
        ->getQuery()
        ->execute();

       
        
        $movieList = $paginator->paginate(
            $movies, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            20 // Nombre de résultats par page
        );
       

        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
            'movieList' => $movieList,
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