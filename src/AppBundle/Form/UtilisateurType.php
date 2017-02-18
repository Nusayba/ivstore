<?php



namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of UtilisateurType
 *
 * @author grand coco
 */
class UtilisateurType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('POST')
                ->add('pseudo')
                ->add('motDePasse')
                ->add('role')
                ->add('ajouter', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }
}
