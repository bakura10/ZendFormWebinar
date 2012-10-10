<?php

namespace Application\Form;

use Application\Entity\Concert;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ObjectProperty;

class ConcertFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('concert');

        $this->setObject(new Concert())
             ->setHydrator(new ObjectProperty());

        $this->add(array(
            'type'    => 'Application\Form\GroupeFieldset',
            'name'    => 'groupe',
            'options' => array(
                'label' => 'Groupe'
            )
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Number',
            'name'    => 'nombreSieges',
            'options' => array(
                'label' => 'Nombre de sièges dans la salle'
            ),
            'attributes' => array(
                'min' => 50
            )
        ));
    }
}
