<?php

namespace Chm\Bundle\DocumentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('slug')
            ->add('niceName')
            ->add('keepOriginalExtension', 'checkbox')
            ->add('file', 'file')
            ->add('validTo')
            ->add('notifySuccess')
            ->add('notifyFailure')
            ->add('ipRestrictions', 'collection', array(
                'type' => new IpRestrictionType(),
                'allow_add' => true,
                'by_reference' => false,
                'widget_add_btn' => array(
                                    'icon'  => 'plus-sign',
                                    'label' => 'Add IP restriction'
                                    ),
                ))
            ->add('downloadCountRestrictions', 'collection', array(
                'type' => new DownloadCountRestrictionType(),
                'allow_add' => true,
                'by_reference' => false,
                ))
            ->add('SecretRestrictions', 'collection', array(
                'type' => new SecretRestrictionType(),
                'allow_add' => true,
                'by_reference' => false,
                ))
            ->add('userRestrictions', 'collection', array(
                'type' => new UserRestrictionType(),
                'allow_add' => true,
                'by_reference' => false,
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chm\Bundle\DocumentBundle\Entity\Document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chm_bundle_documentbundle_document';
    }
}
