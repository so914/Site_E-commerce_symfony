<?php

/*Toutes les classes créées dans le dossier src/Controller doivent utiliser le namespace App\Controller.
Le namespace permet à PHP de charger et d'identifier correctement les classes sans conflit de noms.*/
namespace App\Controller;

//utilisons use pour permettre au fichier d'utiliser les classes qui existent dans d'autres parties de symfony

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/*C'est la classe parente que le contrôleur va étendre.
En l'important, elle permet à notre contrôleur d'accéder à des méthodes utilitaires très pratiques 
fournies par Symfony, comme $this->render() (pour afficher un template Twig), $this->redirectToRoute() 
(pour rediriger), ou $this->json() (pour renvoyer une réponse JSON).*/


use Symfony\Component\HttpFoundation\Response;
/*Importe la classe Response, qui est la classe standard de Symfony utilisée pour encapsuler la 
réponse HTTP renvoyée au navigateur de l'utilisateur (le code HTML, les en-têtes HTTP, etc.)*/


use Symfony\Component\Routing\Attribute\Route;
/*Ceci importe l'Attribut #[Route] que nous utilisons juste au-dessous de votre méthode index() 
pour définir l'URL associée.*/



final class HomeController extends AbstractController
/*final class HomeController: On définit notre classe de contrôleur; Le mot-clé final signifie que cette
classe ne pourra pas être étendue (héritée) par une autre classe, ce qui est une bonne pratique pour les 
contrôleurs.*/

/*extends AbstractController :C'est l'étape cruciale. Elle indique que votre HomeController hérite de 
toutes les fonctionnalités et méthodes de la classe AbstractController (importée plus haut). 
C'est ce qui transforme une simple classe PHP en un Contrôleur Symfony.*/

{
    #[Route('/home', name: 'app_home')]
    // le '/home' représente ici ce que l'utilisateur va taper dans la barre de recherche pour afficher la page
    //l'attribut name va nous permettre d'identifier de manière unique chque routeur et de ne plus coder en dur chaque fois les url
    

    //déclarer de la méthode d'action qui sera effectuée lorsque l'utilisateur accède à la route

    public function index(): Response //response est le type de retour de la fonction
    //lorsqu'on met response on doit toujours retourner quelque grâce à la fonction render
    {
        $name='Yolserve';
        return $this->render('home/index.html.twig', [
            'controller_name' => 'IBARA',
            'name' => $name,
        ]);
        /*$this->render() est une méthode héritée de l'AbstractController.Elle prend en charge 
        l'exécution du moteur de template Twig*/
    }
}
