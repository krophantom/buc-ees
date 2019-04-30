<?php

namespace App\Form;

use App\Entity\Stores;
use App\Entity\Comment;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\RegistryInterface;

class CommentsType extends AbstractType
{

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $storeChoices = $this->doctrine->getRepository(Stores::class)->findAll();

        $choices = [
            'Please Answer' => '0',
            'No' => '1',
            'Yes' => '2'
        ];

        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('fuel', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('employee', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('payment', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('returns', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('lost', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('phone', TextType::class)
            ->add('store', ChoiceType::class, [
                'placeholder' => 'Select a Store',
                'choices' => ['0' => 'Not Applicable'] + $storeChoices,
                'choice_label' => function ($choice, $key, $value) {
                    return is_string($choice) ? $choice : $choice->getStoreName();
                },
            ])
            ->add('application', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('completed', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('deer', ChoiceType::class, [
                'choices' => $choices,
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Please enter your comment here:',
            ])
            ->add('submit', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null
        ]);
    }

} 