<?php

namespace Cliente\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity
 */
class Clientes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=true)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="string")
     */
    private $dataNascimento;

    /**
     * @var \Time
     *
     * @ORM\Column(name="hora_nascimento", type="string")
     */
    private $horaNascimento;

    /**
     * @var integer
     * @ORM\Column(name="sexo", type="integer", nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="salario", type="string", length=50, nullable=true)
     */
    private $salario;    

    public function toArray() {
        return array();
      }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getHoraNascimento()
    {
        return $this->horaNascimento;
    }

    public function setHoraNascimento($horaNascimento)
    {
        $this->horaNascimento = $horaNascimento;

        return $this;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }


}
