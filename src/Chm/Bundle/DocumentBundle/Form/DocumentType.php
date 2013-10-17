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
            ->add('niceName')
            ->add('keepOriginalExtension', 'checkbox', ['required' => false])
            ->add('file', 'file', ['required' => false])
            ->add('slug')
            ->add('notifySuccess')
            ->add('notifyFailure')
            ->add('dateRestrictions', 'collection', [
                'type' => new DateRestrictionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'widget_add_btn' => [
                                    'label' => 'Add'
                                    ],
                ])
            ->add('ipRestrictions', 'collection', [
                'type' => new IpRestrictionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'widget_add_btn' => [
                                    'label' => 'Add'
                                    ],
                ])
            ->add('downloadCountRestrictions', 'collection', [
                'type' => new DownloadCountRestrictionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'widget_add_btn' => [
                                    'label' => 'Add'
                                    ],
                ])
            ->add('SecretRestrictions', 'collection', [
                'type' => new SecretRestrictionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'widget_add_btn' => [
                                    'label' => 'Add'
                                    ],
                ])
            ->add('userRestrictions', 'collection', [
                'type' => new UserRestrictionType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'widget_add_btn' => [
                                    'label' => 'Add'
                                    ],
                ])
            ->add('save', 'submit', [
                    'icon'       => 'save',
                ]
            );
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
