<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * NetworkConfig
 *
 * @ORM\Table(name="network_config")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NetworkConfigRepository")
 *
 * @Gedmo\Tree(type="nested")
 */
class NetworkConfig
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
     * @var NetworkFunction
     *
     * @ORM\ManyToOne(targetEntity="NetworkFunction")
     * @ORM\JoinColumn(name="network_function_id", referencedColumnName="id")
     * @ORM\Column(name="name", type="string", length=255, unique=false)
     */
    private $network_function;

    /*******************************
    TREE ATTRIBUTES
     ******************************/
    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(type="integer")
     */
    private $lft;
    /**
     * @Gedmo\TreeRight
     * @ORM\Column(type="integer")
     */
    private $rgt;
    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="NetworkConfig", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;
    /**
     * @Gedmo\TreeRoot
     * @ORM\Column(type="integer", nullable=true)
     */
    private $root;
    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;
    /**
     * @ORM\OneToMany(targetEntity="NetworkConfig", mappedBy="parent")
     */
    private $children;

    /***********************************************************************************************************************/

    public function __construct()
    {
        $this->attributes = array();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return NetworkConfig
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
/****************************/
    public function setAttributes(array $attributes)
    {
        $this->attributes = $this->converter($attributes);
        return $this;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttributes2()
    {

        return $this->format_parameters($this->attributes);
    }

    public function getAttribute($name, $default = null)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }

        return $default;
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }
/************************************/
    /*****************/
    private function format_parameters($parameters){
        $newParameters =[];
        foreach($parameters as $parameter){
            $newParameters[$parameter['name']] = $parameter['value'];
        }
        return $newParameters;
    }
    /*****************/
    private function converter($parameters){
        $i=0;
        foreach($parameters as $parameter){
            $parameters[$i++]['value'] = $this->castParameters($parameter['datatype'], $parameter['value']);
        }
        return $parameters ;

    }

    private function castParameters($type, $value){
        if ($value){
            switch ($type) {
                case 'BooleanType::class':
                    $value = $value === 'true' | $value = $value === '1' ? true : false;
                    break;
                case 'IntegerType::class':
                    $value = intval($value);
                    break;
                case 'DecimalType::class':
                    $value = floatval($value);
                    break;
                case 'DateTimeType::class':
                    $value = date_create_from_format('d/M/Y:H:i:s', $value);
                    break;
            }
        }
        return $value;
    }


    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return NetworkConfig
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return NetworkConfig
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     *
     * @return NetworkConfig
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return NetworkConfig
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\NetworkConfig $parent
     *
     * @return NetworkConfig
     */
    public function setParent(\AppBundle\Entity\NetworkConfig $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\NetworkConfig
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child
     *
     * @param \AppBundle\Entity\NetworkConfig $child
     *
     * @return NetworkConfig
     */
    public function addChild(\AppBundle\Entity\NetworkConfig $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\NetworkConfig $child
     */
    public function removeChild(\AppBundle\Entity\NetworkConfig $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set networkFunction
     *
     * @param string $networkFunction
     *
     * @return NetworkConfig
     */
    public function setNetworkFunction($networkFunction)
    {
        $this->network_function = $networkFunction;

        return $this;
    }

    /**
     * Get networkFunction
     *
     * @return string
     */
    public function getNetworkFunction()
    {
        return $this->network_function;
    }
}
