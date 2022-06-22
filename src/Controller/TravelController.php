<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\PostLike;
use App\Entity\Travel;
use App\Entity\TravelLike;
use App\Entity\User;
use App\Form\CommentsType;
use App\Form\TravelLikeType;
use App\Repository\TravelLikeRepository;
use App\Repository\TravelRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function show($id, TravelRepository $repo, Request $request, EntityManagerInterface $em): Response
    {
        $bestThreeTravels = $this->entityManager->getRepository(Travel::class)->findByIsBest(1);
    
        // Afficher le détail pour chaque voyage
        $travel = $repo->findOneBy(['id' => $id]);
        // Partie commentaires
        // On crée notre commentaire
        $comment = new Comments;
        // On génère le formulaire
        $commentForm = $this->createForm(CommentsType::class, $comment);
        $commentForm->handleRequest($request);

        // Traitement du formulaire
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setDate(new DateTime());
            $comment->setEmail($this->getUser()->getEmail());
            $comment->setTravel($travel);

            // On récupère le contenu du champ parent
            //$parentid = $commentForm->get("parentsid")->getData();

            // On va chercher le commentaire correspondant
            // $em = $this->getDoctrine()->getManager();
            
            // if ($parentid != null){
            //     $parent = $em->getRepository(Comments::class)->find($parentid);
            // }

            // On définit le parent
            // $comment->setParents($parent ?? null);

            $em->persist($comment);
            $em->flush();

            $this->addFlash('message', 'Votre commentaire a bien été enregistré');
            return $this->redirectToRoute('app_travel_details', ['id' => $travel->getId()]);
         }

        // On like un voyage
        $like = new TravelLike();
        $like->setTravel($travel);
        $like->setUser($this->getUser());


            return $this->render('travel/show.html.twig', [
            'travel' => $travel,
            'commentForm' => $commentForm->createView(),
            'bestThreeTravels' => $bestThreeTravels, 
            'like' => $like
        ]);
        
    }

    /**
     * Permet de liker ou unliker un voyage
     * @Route("/nos-voyages/{id}/like", name="travel_like")
     */
    public function like(Travel $travel, EntityManagerInterface $em, TravelLikeRepository $repo) : Response {

        $user = $this->getUser();

        if(!$user) return $this->json([
            'code' => 403,
            'message' => 'Unauthorized'
        ], 403);

        if($travel->isLikedByUser($user)) {
            $like = $repo->findOneBy([
                'travel' => $travel,
                'user' => $user
            ]);

            $em->remove($like);
            $em->flush();

            return $this->json([
                'code' => 200,
                'message' => 'Like bien supprimé',
                'likes' => $repo->count(['travel' => $travel])
            ], 200);
        }

        $like = new TravelLike();
        $like->setTravel($travel)
             ->setUser($user);

        $em->persist($like);
        $em->flush();

        return $this->json([
            'code' => 200, 
            'message' => 'ca marche bien',
            'likes' => $repo->count(['travel' => $travel])
        ], 200);

    }


}
