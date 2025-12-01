<?php

namespace App\Twig\Components;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent]
final class ArticleForm extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    //#[LiveProp]
    //public ?Article $article=null;

    public function instantiateForm(): FormInterface
    {
        return $this->createForm(ArticleType::class);
    }

    
}
