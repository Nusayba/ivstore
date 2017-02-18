<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\Background;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of modifBackground
 *
 * @author Administrateur
 */
class ModifBackgroundType extends AbstractType{
    
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->setMethod('PATCH')
                ->add('modifier', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
    
    

}
