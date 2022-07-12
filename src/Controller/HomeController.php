<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Agency;
use App\Entity\NumberOfPeople;
use App\Entity\Period;
use App\Entity\Style;
use App\Entity\Travel;
use App\Repository\PeriodRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/", name="app_home")
     */
    public function index(PeriodRepository $repo): Response
    {
        $allStyles = $this->entityManager->getRepository(Style::class)->findAll();
        $allPeriods = $repo->findBy(
            ['value' => 50],
            []
        );
        $allActivities = $this->entityManager->getRepository(Activity::class)->findAll();
        $allNumberOfPeoples = $this->entityManager->getRepository(NumberOfPeople::class)->findAll();

        $lastThreeTravels = $this->entityManager->getRepository(Travel::class)->findBy(
            [],
            ['id' => 'DESC'],
            3
        );

        $topAgencies = $this->entityManager->getRepository(Agency::class)->findByIsTop(1);
       
        return $this->render('home/index.html.twig', [
            'lastThreeTravels' => $lastThreeTravels,
            'topAgencies' => $topAgencies,
            'allStyles' => $allStyles,
            'allPeriods' => $allPeriods,
            'allActivities' => $allActivities,
            'allNumberOfPeoples' => $allNumberOfPeoples
        ]);
    }

    /**
     * @Route("/a-propos", name="about_us")
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }


}