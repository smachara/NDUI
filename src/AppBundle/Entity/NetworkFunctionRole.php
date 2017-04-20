<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeFunction
 *
 * @ORM\Table(name="network_function_role")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeFunctionRepository")
 */
class NetworkFunctionRole
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, unique=false)
     */
    private $color;


    /**
     * @var string
     *
     * @ORM\Column(name="stroke", type="string", length=255, unique=false)
     */
    private $stroke;



    /**
     * @ORM\OneToOne(targetEntity="Symbol", mappedBy="networkFunctionRole", cascade={"persist"})
     * @var Symbol
     */
    protected $symbol;

    /**
     * Set symbol
     *
     * @param Symbol $symbol
     *
     * @return NetworkFunctionRole
     */
    public function setSymbol(Symbol $symbol = null)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return Symbol
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return NetworkFunctionRole
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getStroke()
    {
        return $this->stroke;
    }

    /**
     * @param string $stroke
     */
    public function setStroke($stroke)
    {
        $this->stroke = $stroke;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="shape", type="string", length=255, unique=false)
     */
    private $shape;

    /**
     * @return string
     */
    public function getShape()
    {
        return $this->shape;
    }
     /**
     * @param string $shape
     */
    public function setShape($shape)
    {
        $this->shape = $shape;
    }
}

