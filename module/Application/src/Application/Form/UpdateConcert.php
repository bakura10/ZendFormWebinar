<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ObjectProperty;

class UpdateConcert extends Form
{
    public function __construct()
    {
        parent::__construct('update-concert-form');

        $this->setHydrator(new ObjectProperty());

        $this->add(array(
            'type'    => 'Application\Form\ConcertFieldset',
            'name'    => 'concert',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(array(
            'type'       => 'Zend\Form\Element\Submit',
            'name'       => 'submit',
            'attributes' => array(
                'value' => 'Mettre à jour !',
                'class' => 'btn-success'
            )
        ));

        $this->setValidationGroup(array(
            'concert' => array(
                'nombreSieges'
            )
        ));
    }
}

