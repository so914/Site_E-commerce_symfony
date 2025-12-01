<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(CategorieRepository $reporisitory): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categories'=>$reporisitory->findAll()
        ]);
    }

    #[Route('/categorie/nouvelle-categorie',name:'app_categorie_create', methods:['POST','GET'])]
    public function create(Request $request, CategorieRepository $reporisitory):Response
    {
        //creation d'un objet de type categorie
        $categorie=new Categorie();

        //creation du form
        $form=$this->createForm(CategorieType::class,$categorie);

        //ecouter la requête et la gérer
        $form->handleRequest($request);

        //si leur formulaire est valide
        if ($form->isSubmitted() && $form->isValid())
        {
            $reporisitory->save($categorie,true);

            //toujours rediriger après soumission du form
            $this->redirectToRoute('app_home',[],302);
        }

        return $this->render('categorie/create.html.twig',[
            'form'=>$form,
        ]);
    }
}
