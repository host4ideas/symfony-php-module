<?php
// src/Form/Type/HelloType.php
namespace App\Form\Type;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class HelloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [  'constraints' => [new Length(['min' => 3])]])
            ->add('surname', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}