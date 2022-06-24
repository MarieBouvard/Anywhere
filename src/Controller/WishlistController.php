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

        $wishTotal = [];

        foreach ($wish->get() as $id => $quantity){
            $wishTotal[] = [
                'travel' => $this->entityManager->getRepository(Travel::class)->findOneById($id),
                'quantity' => $quantity
            ];
        }


        return $this->render('wishlist/index.html.twig', [
            'wish' => $wishTotal
        ]);
    }


    /**
     * @Route("/wish/add/{id}", name="wish_add")
     */
    public function add(Wish $wish, $id){

        $wish->add($id);

        return $this->redirectToRoute('wish');
    }


    /**
     * @Route("/wish/remove", name="wish_remove")
     */
    public function remove(Wish $wish){

        $wish->remove();

        return $this->redirectToRoute('app_travel');

    }

}
