<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use AppBundle\Model\NetworkConfigModel;
/**
 * NetworkConfig
 *
 * @ORM\Table(name="network_config")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NetworkConfigRepository")
 *
 * @Gedmo\Tree(type="nested")
 */
class NetworkConfig  extends NetworkConfigModel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="NetworkFunction")
     * @ORM\JoinColumn(name="network_function_id", referencedColumnName="id")
     * @var String
     */
    protected $network_function;


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
    protected $children;

    /***********************************************************************************************************************/

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

//    /**
//     * Add child
//     *
//     * @param \AppBundle\Entity\NetworkConfig $child
//     *
//     * @return NetworkConfig
//     */
//    public function addChild(\AppBundle\Entity\NetworkConfig $child)
//    {
//        $this->children[] = $child;
//
//        return $this;
//    }
//
//    /**
//     * Remove child
//     *
//     * @param \AppBundle\Entity\NetworkConfig $child
//     */
//    public function removeChild(\AppBundle\Entity\NetworkConfig $child)
//    {
//        $this->children->removeElement($child);
//    }
//
//    /**
//     * Get children
//     *
//     * @return \Doctrine\Common\Collections\Collection
//     */
//    public function getChildren()
//    {
//        return $this->children;
//    }
//
//    /**
//     * Set networkFunction
//     *
//     * @param string $networkFunction
//     *
//     * @return NetworkConfig
//     */
//    public function setNetworkFunction($networkFunction)
//    {
//        $this->network_function = $networkFunction;
//
//        return $this;
//    }
//
//    /**
//     * Get networkFunction
//     *
//     * @return NetworkFunction
//     */
//    public function getNetworkFunction()
//    {
//        return $this->network_function;
//    }
}