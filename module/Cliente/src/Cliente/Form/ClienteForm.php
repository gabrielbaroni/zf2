<?php

namespace Cliente\Form;

use Zend\Form\Form;

class ClienteForm extends Form {

    public function __construct($tiposOptions = null)
    {
        parent::__construct('cliente');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));        
        $this->add(array(
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome'
            ),
            'attributes' => array('class' => 'form-control'),
        ));
        $this->add(array(
            'name' => 'data_nascimento',
            'type' => 'Text',
            'options' => array('label' => 'Data Nascimento'),
            'attributes' => array('class' => 'form-control date'),
        ));
        $this->add(array(
            'name' => 'hora_nascimento',
            'type' => 'Text',
            'options' => array('label' => 'Hora Nascimento'),
            'attributes' => array('class' => 'form-control time'),
        ));        
        $this->add(array(
            'name' => 'salario',
            'type' => 'Text',
            'attributes' => array(
                'maxlength' => '100', 'class' => 'form-control money'
            ),
            'options' => array(
                'label' => 'Salário',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'sexo',
            'attributes' => array(
                'id' => 'sexo', 'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Sexo', 
                'value_options' => array('1' => 'Masculino', '2' => 'Feminino')
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));
    }

}
