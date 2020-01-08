<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movie")
     */
    public function add()
    {
        return $this->render('admin/movies/add.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
