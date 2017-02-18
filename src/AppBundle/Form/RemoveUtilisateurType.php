<?php



namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * Description of RemoveUtilisateurType
 *
 * @author grand coco
 */
class RemoveUtilisateurType extends AbstractType{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->setMethod('DELETE')
                ->add('supprimer', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }
}
