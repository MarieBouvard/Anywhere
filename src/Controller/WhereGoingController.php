<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Repository\AgencyRepository;
use App\Repository\StyleRepository;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



// !  Suite du controller WhereToGo à la suite d'un problème de méthode qui ne lisait plus les fichiers twig //


/**
 * @Route("/où-partir", name="app_")
 */
class WhereGoingController extends AbstractController
{
    /**
     * @Route("/roadtrip", name="roadtrip")
     */
    public function roadtrip(TravelRepository $repo) :Response
    {
        // Affiche tous les voyages en style autotour & roadtrip => style.id = 1
       $roadtripTravels = $repo->findBy(
        ['style' => 1],
        ['place' => 'ASC']
       );

       // Affiche toutes les agences qui proposent des voyages en autotour >> voir requete dans TravelRepository
       $roadtripAgencies = $repo->roadtripTravelAgency();
  

        return $this->render('where_to_go/roadtrip.html.twig', [
            'roadtripTravels' => $roadtripTravels,
            'roadtripAgencies' => $roadtripAgencies
        ]);
                
    }
}
