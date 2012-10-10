<?php

namespace Application\Form;

use Application\Entity\Groupe;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty;

class GroupeFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('groupe');

        $this->setObject(new Groupe())
             ->setHydrator(new ObjectProperty());

        $this->add(array(
            'name'    => 'nom',
            'options' => array(
                'label' => 'Nom du groupe'
            )
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Url',
            'name'    => 'site',
            'options' => array(
                'label' => 'Site web du groupe'
            )
        ));
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'nom' => array(
                'required'   => true,
                'filters'    => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array('name' => 'StringLength', array('max' => 48))
                )
            )
        );
    }
}
