<?php

namespace App\Controller\Animal;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AnimalRepository;
use App\Repository\FavorisRepository;
use App\Form\AnimalType;
use App\Form\ModifType;
use App\Entity\Animal;
use App\Entity\Favoris;


class ChoixanimalController extends AbstractController
{
    #[Route('/choisir', name: 'app_choixanimal')]
    public function index(): Response
    {
        return $this->render('Animal/choixanimal.html.twig');
    }

    #[Route('/afficher', name: 'app_afficher')]
    public function app_afficher(AnimalRepository $repository,FavorisRepository $f): Response
    {
        $animal = $repository->findAll();
        $fav = $f->findAll();
        return $this->render('Animal/choixanimal.html.twig',['animal'=>$animal,'fav'=>$fav]);
    }

    #[Route('/formAjout', name: 'app_affformajout',methods: ['GET','POST'])]
    public function app_affformajout(Request $request,ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $em->persist($animal);
           $em->flush();
           return $this->redirectToRoute('app_afficher');
        }
        else{
            return $this->renderForm("Animal/ajouteranimal.html.twig", ["form" => $form]);
        }
    }

    #[Route('/favoris/{nom}', name: 'animal_favoris')]
    public function animal_favoris(ManagerRegistry $doctrine,AnimalRepository $repository, Request $request,$nom): Response
    {
        $em=$doctrine->getManager();
        $animal = $repository->findOneBy(['nom' => $nom]);
        $fav = new Favoris();
        $favRepository = $em->getRepository(Favoris::class);
        $existingFavoris = $favRepository->findOneBy(['ida' => $animal]);

        if ($existingFavoris) {
            // If the animal already exists in the favoris table, delete it
            $em->remove($existingFavoris);
            $em->flush();
        } else {
            // If the animal does not exist in the favoris table, add it
            $fav = new Favoris();
            $fav->setIda($animal);
            $fav->setNoma($animal->getNom());
            $em->persist($fav);
            $em->flush();
        }
        return $this->redirectToRoute('app_afficher');
    }

    #[Route('/details/{nom}', name: 'app_details')]
    public function app_details($nom,AnimalRepository $repository,Request $request,ManagerRegistry $doctrine): Response
    {
        $em=$doctrine->getManager();
        $animal = $repository->findOneBy(['nom' => $nom]);
        $animaux = new Animal();
        $form = $this->createForm(ModifType::class, $animal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->render('Animal/detailsanimal.html.twig',["form" => $form,'nom'=>$nom,'animal'=>$animal]);
        }
        else{
            return $this->renderForm('Animal/detailsanimal.html.twig',["form" => $form,'nom'=>$nom,'animal'=>$animal]);
        }
    }

    #[Route('/delete/{nom}', name: 'animal_del')]
    public function animal_del(ManagerRegistry $doctrine, AnimalRepository $repository, Request $request,$nom): Response
    {
        $em=$doctrine->getManager();
        $animal = $repository->findOneBy(['nom' => $nom]);
        $em->remove($animal);
        $em->flush();
        return $this->redirectToRoute('app_afficher');
    }

    
}
