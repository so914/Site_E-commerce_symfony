<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code',TextType::class,[
                'attr'=>[
                    'placeholder'=>"Entrez le code"
                ]
            ])
            ->add('nom',TextType::class,[
                'label'=>'nom de la catégorie'
            ])
            ->add('description')
            ->add('categorieParent', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'placeholder'=>'Selectionnez la catégroie parent'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
