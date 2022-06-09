<?php

namespace App\Controller;

use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravelController extends AbstractController
{
   
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

    /**
     * @Route ("/nos-voyages", name="app_travel")
     */
    public function index(TravelRepository $repo): Response 
    {
        // Afficher tous les voyages proposés
        $travel = $repo->findAll();

        return $this->render('travel/index.html.twig', [
            'travel' => $travel
        ]);

    }


}
