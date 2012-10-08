<?php

namespace Application\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class GrouêFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('groupe');

        $this->add(array(
            'name'    => 'nom',
            'options' => array(
                'label' => 'Nom'
            )
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Url',
            'name'    => 'site',
            'options' => array(
                'label' => 'Site web'
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
