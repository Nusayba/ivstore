<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of PointType
 *
 * @author grand coco
 */
class MPointType extends AbstractType{
     public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->setMethod('PATCH')
                ->add('x', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('y', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('position', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
                ->add('utilisateur', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class,array('class'=>'AppBundle:Utilisateur'))
                ->add('modifier', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
