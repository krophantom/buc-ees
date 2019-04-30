<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ContributionsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('org_name', TextType::class, [
            'label' => 'Organization Name'
        ])
        ->add('address', TextType::class, [
            'label' => 'Address'
        ])
        ->add('citystatezip', TextType::class, [
            'label' => 'City, State, Zip'
        ])
        ->add('phone', TextType::class, [
            'label' => 'Phone'
        ])
        ->add('fax', TextType::class, [
            'label' => 'Email'
        ])
        ->add('email', TextType::class, [
            'label' => 'Fax'
        ])
        ->add('website', TextType::class, [
            'label' => 'Website'
        ])
        ->add('name', TextType::class, [
            'label' => 'Your Name'
        ])
        ->add('org_officers', TextareaType::class, [
            'label' => 'Please list your organization\'s officers and their phone numbers.'
        ])
        ->add('org_directors', TextareaType::class, [
            'label' => 'Please list your organization\'s board of directors and their phone numbers.'
        ])
        ->add('mission_statement', TextareaType::class, [
            'label' => 'Please tell us your organization\'s purpose or Mission Statement.'
        ])
        ->add('area', TextareaType::class, [
            'label' => 'Please tell us what geographical area you serve.'
        ])
        ->add('expenses', TextareaType::class, [
            'label' => 'What is your annual budget and operating expenses? Please list in detail. '
        ])
        ->add('date', DateType::class, [
            'label' => 'Click on the calendar button below to select the date you need this donation:',
            'html5' => true,
            'widget' => 'single_text',
            'attr' => [
                'min' => '2019-04-17'
            ]
        ])
        ->add('tax_id', TextType::class, [
            'label' => 'To document non-profit status, please include your tax-exempt I.D. number. '
        ])
        ->add('usage', TextareaType::class, [
            'label' => 'How will your organization use this donation?'
        ])
        ->add('benefits', TextareaType::class, [
            'label' => 'Most important of all, explain in detail how our contribution to you will help benefit the entire community.'
        ])
        ->add('501c3', ChoiceType::class, [
            'choices' => [
                'No' => false,
                'Yes' => true
            ],
            'label' => 'Is this contribution for an eligible 501(c)(3) organization based in a community where Buc-ee\'s operates?'
        ])
        ->add('needed', ChoiceType::class, [
            'choices' => [
                'No' => false,
                'Yes' => true
            ],
            'label' => 'Is the contribution needed AFTER the first week of the next quarter?'
        ])
        ->add('donors', ChoiceType::class, [
            'choices' => [
                'Yes' => true,
                'No' => false
            ],
            'label' => 'Does your organization sell the names of donors?'
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