<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Repository\TravelRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
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
    public function index(): Response
    {
        
        $lastThreeTravels = $this->entityManager->getRepository(Travel::class)->findBy(
            [],
            ['place' => 'ASC'],
            3,
            2
        );
       
        return $this->render('home/index.html.twig', [
            'lastThreeTravels' => $lastThreeTravels
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