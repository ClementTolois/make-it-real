<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class,[
                'attr' => [
                    'placeholder' => 'First name',
                    'value' => ''
                ], 
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a first name'
                    ])
                ]
            ])
            ->add('lastName',TextType::class,[
                'attr' => [
                    'placeholder' => 'Last name',
                    'value' => ''
                ],
                 'label' => false,
                 'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a last name'
                    ])
                ]
            ])
            ->add('email',EmailType::class,[
                'attr' => [
                    'placeholder' => 'exemple@make-it-real.com',
                    'value' => ''
                ], 
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an email'
                    ])
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => false,'attr' => ['placeholder' => 'Password']],
                'second_options' => ['label' => false, 'attr' => ['placeholder' => 'Repeat your password']],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'I know, it\'s tiresome, but you must agree to our terms.'
                    ])
                ],
                'label' => false
            ])
            ->add('register', SubmitType::class, [
                'attr' => ['class' => 'btn btn-outline-danger'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
