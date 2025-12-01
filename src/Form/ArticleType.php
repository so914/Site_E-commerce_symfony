<?php

namespace App\Form;


use App\Entity\Article;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'Désignation de l\'article',
                'attr'=>[
                    "placeholder"=>"Entrez le nom de l'article"
                ],
                'constraints'=>[
                    new NotBlank(message:'Le nom du produit ne peut pas être vide'),
                    new Length(min:2, max:50,minMessage:'Le nom de l\'article ne peut pas contenir moins de 2 caractères',maxMessage:'Le nom de l\'article est trop long')
                    ]
            ])
            ->add('quantite', IntegerType::class,[
                'label'=>'Quantité',
                'attr'=>[
                    'placeholder'=>'Entrez la quantié',
                ],
                'constraints'=>[
                    new GreaterThan(value:0),
                    new NotBlank(),
                ]
            ])
            ->add('articleImages',LiveCollectionType::class,
            [
                'entry_type'=>ArticleImageType::class,
            ]
            )

            ->add('prix',MoneyType::class,[
                'label'=>'Prix unitaire',
                'attr'=>[
                    'placeholder'=>'Entrez le prix',
                ],
                'currency'=>'XAF'
            ])
            ->add('description')
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'placeholder'=>'Sélectionnez la catégorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
