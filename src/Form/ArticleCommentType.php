<?php

namespace App\Form;

use App\Entity\CommentUser;
use App\Entity\ArticleComment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ArticleCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message')
            ->add('email', EmailType::class);


     /*   $builder->add('idUser', EntityType::class, [
            'class' => CommentUser::class,
            'choice_label' => 'email',

         
         ]);*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ArticleComment::class,
        ]);
    }
}
