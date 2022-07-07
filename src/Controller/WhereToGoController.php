<?php

namespace App\Controller;

use App\Repository\AgencyRepository;
use App\Repository\PeriodRepository;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/où-partir", name="app_")
*/
class WhereToGoController extends AbstractController
{
    /**
     * @Route("/été", name="where_to_go")
     */
    public function summer(PeriodRepository $repo, AgencyRepository $repoAgency): Response
    {
        // Affiche 3 voyages à faire durant le mois de Juin
        $travelsJune = $repo->travelInJune(30);

        // Affiche 5 pays à visiter l'été
        $heartUsersTravels = $repo->findHeartUsersTravels(33);

        // Affiche 3 voyages à faire durant le mois de Juillet
        $travelsJuly = $repo->travelInJuly(33);


        //Agence spécialisées dans les voyages en été
        $summerAgencies = $repoAgency->findSummerAgency();

        $summersJune = ($travelsJune->getTravel());
        $heartUsers = ($heartUsersTravels->getTravel());
        $summersJuly = ($travelsJuly->getTravel());
    
        return $this->render('where_to_go/summer.html.twig', [
            'summersJune' => $summersJune,
            'heartUsers' => $heartUsers,
            'summersJuly' => $summersJuly,
            'summerAgencies' => $summerAgencies
        ]);
    }


    /// ! Problème avec cette méthode - les méthodes aprés celle-ci ne renvoient pas de fichier twig. Voir suite du controller avec WhereGoingController 


    /**
     * @Route("/{country}", name="country")
     */
    public function byCountry($country, TravelRepository $repo) :Response
    {
        //Afficher tous les voyages par pays.
        $travel = $repo->findBy(
            ['country' => $country],
            ['place' => 'ASC'],
        );

        return $this->render('where_to_go/byCountry.html.twig', [
            'travel' => $travel
        ]);
    }
    
}



   
