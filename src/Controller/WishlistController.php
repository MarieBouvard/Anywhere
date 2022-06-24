<?php

namespace App\Controller;

use App\Classe\Wish;
use App\Entity\Travel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WishlistController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/wish", name="wish")
     */
    public function index(Wish $wish)
    {
        return $this->render('wishlist/index.html.twig');
    }

}
