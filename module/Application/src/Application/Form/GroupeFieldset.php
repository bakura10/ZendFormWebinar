<?php

namespace Application\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class BandFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('band');

        $this->add(array(
            'name'    => 'name',
            'options' => array(
                'label' => 'Nom'
            )
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Url',
            'name'    => 'websiteUrl',
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
            'name' => array(
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
