<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('picture',FileType::class,[
                'mapped'=>false,
            ])
            ->add('cost', MoneyType::class,[
                "label"=>"Prix :"])

            ->add('excerpt')
            ->add('description')
            //->add('created_at')
            //->add('user')
            ->add('city', EntityType::class, [
                'class' => City::class,
                'multiple' => false,
                'expanded' => false
                ])

            ->add('categories', EntityType::class, [
                    'class' => Category::class,
                    'multiple' => true,
                    'expanded' => true
                    ])


            ->add('picture', FileType::class, [
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Files...'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
