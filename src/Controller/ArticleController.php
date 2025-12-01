<?php

namespace App\Controller;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'app_article')]
    public function index(ArticleRepository $repository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles'=>$repository->findAll()
        ]);
    }


    /**
    * créons une méthode qui va permettre d'ajouter des articles dans la db
    * la fonction va s'exécuter en fonction de la requête de l'utilisateur on créé une variable de type request
    * on doit crééer une variable qui va s'occuper de la sauvergarde grace à entitymanagerinterface
    * @param Request $request
    * @param EntityManagerInterface $entityManager
    * @return Response
     */

    #[Route(path:'/articles/nouvel-article', name:'app_article_create',methods:['POST','GET'])]
    Public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        //création d'un objet de type article
        $article=new Article();

        //on doit avoir un formulaire pour saisir les informations de l'article
        $form=$this->createForm(ArticleType::class,$article);

        //prendre en charge la requête,a pour rôle de synchroniser ces données avec la structure de l'objet $form
        $form->handleRequest($request);

        //si leur formulaire est valide
        if ($form->isSubmitted() && $form->isValid())
        {
            //sauvergarder avec entitymanager
            //Indiquer à Doctrine qu'une nouvelle entité (votre nouvel article) doit être enregistrée.
            $entityManager->persist($article);

            //Exécuter la ou les commandes SQL pour sauvegarder réellement les changements (la création de l'article) dans la base de donnée
            $entityManager->flush();

            //toujours rediriger après soumission du form
            return $this->redirectToRoute('app_home',[],302);
        }

        return $this->render('article/create.html.twig',[
            'articleForm'=>$form,
        ]);
    }

    #[Route('/article/{id}',name:'app_article_show')]
    public function show(Article $article):Response
    {
        return $this->render('article/show.html.twig',[
            'article'=>$article
        ]);
    }
}
