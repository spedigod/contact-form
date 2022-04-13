<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'error_bubbling' => true,
                'required' => false,
                'trim' => true,
                'attr' => ['class' => 'form-control', 
                            'placeholder' => 'Jane Doe']
            ])
            ->add('email', EmailType::class, [
                'error_bubbling' => true,
                'required' => false,
                'trim' => true,
                'attr' => ['class' => 'form-control', 
                            'placeholder' => 'John@Doe.com']
            ])
            ->add('message', TextareaType::class, [
                'error_bubbling' => true,
                'required' => false,
                'help' => 'Ide írja a nekünk szánt kérdését',
                'help_attr' => ['class' => 'helper'],
                'attr' => ['class' => 'form-control', 
                            'placeholder' => 'Lorem ipsum dolor sit amet']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Üzenetek küldése',
                'attr' => ['class' => 'btn-lg btn btn-dark btn-block']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
