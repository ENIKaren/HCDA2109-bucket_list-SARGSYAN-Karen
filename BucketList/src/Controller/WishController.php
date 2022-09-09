<?php

namespace App\Controller;

use App\Repository\WishRepository;
use App\Entity\Wish;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(WishRepository $wishRepository,EntityManagerInterface $entityManager,int $id): Response
    {
        $wish1= new wish();
        $wish1->setTitle("Sauter en parachute");
        $wish1->setDescription("Sauter avec mes amis avec ou sans parachute");
        $wish1->setAuthor("Christophe Jallet");
        $wish1->setIsPublished(true);
        $wish1->setDateCreated(new \DateTime());

        $wishRepository->add($wish1);
        $entityManager->persist($wish1);
        $entityManager->flush($wish1);


        $wish2= new wish();
        $wish2->setTitle("Boire du champagne dans une limousine");
        $wish2->setDescription("J'ai vu ca dans la série How I met your mother et ça avait l'aire grave lourd");
        $wish2->setAuthor("Benoit Trémoulinas");
        $wish2->setIsPublished(true);
        $wish2->setDateCreated(new \DateTime());

        $wishRepository->add($wish2);
        $entityManager->persist($wish2);
        $entityManager->flush($wish2);

        $wish3= new wish();
        $wish3->setTitle("Laisser ma trace sur le mont Everest ");
        $wish3->setDescription("Quand je dis trace je parles de mes excréments");
        $wish3->setAuthor("Nasser al-Khelaïfi");
        $wish3->setIsPublished(true);
        $wish3->setDateCreated(new \DateTime());

        $wishRepository->add($wish3);
        $entityManager->persist($wish3);
        $entityManager->flush($wish3);
        $wishRepository->findBy($id);

        $listidees = $wishRepository->findBy([]);

        return $this->render('wish/list.html.twig', [
            "listidees" => $listidees,
            'controller_name' => 'WishController',
        ]);
    }
    /**
     * @Route("/detail{id}", name="detail")
     */
    public function detail(): Response
    {
        return $this->render('wish/detail.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
}
