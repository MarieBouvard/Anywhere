<?php

namespace App\Controller;

use App\Classe\Wish;
use App\Entity\Travel;
use App\Entity\Wishlist;
use App\Repository\WishlistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishlistController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    // /**
    //  * @Route("/wish/", name="wish")
    //  */
    // public function index() : Response
    // {
    //     $wishlist = $this->entityManager->getRepository(Wishlist::class)->findAll();

    //     return $this->render('account/wishlist.html.twig', [
    //         'wishlist' => $wishlist
    //     ]);
    // }

}
