<?php

namespace AtolHubBundle\Form\Type;

use AtolHubBundle\Entity\AtolHub;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AtolHubType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('ip')
            ->add('username', 'text', array('data' => 'user'))
            ->add('password', 'text', array('data' => 'Password_1'))
            ->add('active')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => AtolHub::class,
        ));
    }

    public function getName()
    {
        return 'atol_hub_hub';
    }
}
