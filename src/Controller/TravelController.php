<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Repository\TravelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravelController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
   
    /**
     * @Route ("/style/{id}", name="app_style_id")
     */
    public function byStyle($id, TravelRepository $repo) :Response
    {
        // Afficher tous les voyages par catégories. 
        $travel = $repo->findBy(
            ['style' => $id],
            ['place' => 'ASC'],
        );
        
        return $this->render('style/list.html.twig', [
            'travel' => $travel
        ]);
        
    }

    /**
     * @Route ("/nos-voyages", name="app_travel")
     */
    public function index(TravelRepository $repo): Response 
    {
        // Afficher tous les voyages proposés
        $travels = $repo->findAll();
        return $this->render('travel/index.html.twig', [
            'travels' => $travels
        ]);

    }

    /**
     * @Route("/nos-voyages/{id}", name="app_travel_details")
     */
    public function show($id, TravelRepository $repo): Response
    {
        // Afficher le détail pour chaque voyage 
        $travel = $repo->find($id);

        return $this->render('travel/show.html.twig', [
            'travel' => $travel
        ]);

    }


}
