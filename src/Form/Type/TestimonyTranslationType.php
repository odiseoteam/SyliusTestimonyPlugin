<?php

declare(strict_types=1);

namespace Odiseo\SyliusTestimonyPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class TestimonyTranslationType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'odiseo_sylius_testimony.form.testimony.title',
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'odiseo_sylius_testimony.form.testimony.description',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'odiseo_sylius_testimony_testimony_translation';
    }
}
