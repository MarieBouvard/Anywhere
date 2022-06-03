<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Repository\CategoryRepository;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravelController extends AbstractController
{
    /**
     * @Route("/category", name="app_category")
     */
    public function index(CategoryRepository $repo): Response
    {
        $category = $repo->findAll([], ['name'=>'DESC']);
        return $this->render('category/index.html.twig', [
            'category' => $category
        ]);
               
    }

    /**
     * @Route ("/category/{id}", name="app_category_id")
     */
    public function byCategory($id, TravelRepository $repo) :Response
    {
        // Afficher tous les voyages par catégories. 
        $travel = $repo->findBy(
            ['category' => $id],
            ['place' => 'ASC'],
        );
        
        return $this->render('category/list.html.twig', [
            'travel' => $travel
        ]);
        
    }


}
