<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nombre',
                'attr' => [                    
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextType::class, [      
                'label' => 'Descripción',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('price',NumberType::class, [
                'help' => 'Ejemplo: 25.50',
                'label' => 'Precio',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('stock',IntegerType::class, [
                'label' => 'Stock',
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
