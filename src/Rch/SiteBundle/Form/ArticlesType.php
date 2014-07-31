<?php

namespace Rch\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticlesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          
        $builder
            ->add('titre',   'text')
            ->add('contenu', 'textarea', array(
                    'attr' => array(
                        'class'      => 'tinymce',
                        'data-theme' => 'medium' // Skip it if you want to use default theme
                        )
                    )
           )
            ->add('image',   new ImageType(), array('required' => false)) // Rajoutez cette ligne
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rch\SiteBundle\Entity\Articles'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rch_sitebundle_articles';
    }
}
