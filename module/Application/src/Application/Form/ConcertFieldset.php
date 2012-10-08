<?php

namespace Application\Form;

use Zend\Form\Fieldset;

class ConcertFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('concert');

        $this->add(array(
            'type'    => 'Application\Form\BandFieldset',
            'name'    => 'band',
            'options' => array(
                'label' => 'Groupe'
            )
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Number',
            'name'    => 'availableSeats',
            'options' => array(
                'label' => 'Nombre de sièges dans la salle'
            ),
            'attributes' => array(
                'min' => 50
            )
        ));
    }
}
