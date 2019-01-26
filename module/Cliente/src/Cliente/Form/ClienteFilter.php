<?php

namespace Cliente\Form;

// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class ClienteFilter implements InputFilterAwareInterface {

    public $id;
    public $nome;
    public $salario;
    public $data_nascimento;
    public $hora_nascimento;
    public $sexo;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->nome = (isset($data['nome'])) ? $data['nome'] : null;
        $this->salario = (isset($data['salario'])) ? $data['salario'] : null;
        $this->sexo = (isset($data['sexo'])) ? $data['sexo'] : null;
        $this->data_nascimento = (isset($data['data_nascimento'])) ? $data['data_nascimento'] : null;
        $this->hora_nascimento = (isset($data['hora_nascimento'])) ? $data['hora_nascimento'] : null;
    }
    
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        return get_object_vars($this);
    }

    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name' => 'id',
                'required' => false,
            ));

            $inputFilter->add(array(
                'name' => 'nome',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 4,
                            'max' => 50,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'salario',
                'required' => true,                
            ));

            $inputFilter->add(array(
                'name' => 'sexo',
                'required' => true,                
            ));            
            $inputFilter->add(array(
                'name' => 'data_nascimento',
                'required' => true,                
            ));
            $inputFilter->add(array(
                'name' => 'hora_nascimento',
                'required' => true,                
            ));            
            /*
            $inputFilter->add(array(
                'name' => 'salario',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),                    
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 8,
                            'max' => 11,
                        ),
                    ),
                ),
            ));   */         

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
        
    }

}
