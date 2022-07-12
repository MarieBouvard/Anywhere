<?php

namespace App\Controller;

use App\Repository\AgencyRepository;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgencyController extends AbstractController
{
    /**
     * @Route("où-partir/{country}/agences/agence-{id}", name="app_agency")
     */
    public function index($id, AgencyRepository $repo, TravelRepository $repoTravel): Response
    {
        // Détails par agence
         $agency = $repo->findOneBy(['id' => $id]);

        // Afficher le voyage <3 par agence - proriete isGem pour un voyage de l'agence
        $bestTravel = $repoTravel->findOneByAgencyIsGem($id);
        
        //Afficher tous les autres voyages de l'agence
         $travel = $repoTravel->findTravelByAgency($id);

        return $this->render('agency/index.html.twig', [
            'agency' => $agency,
            'travel' => $travel,
            'bestTravel' => $bestTravel
        ]);
    }
}
