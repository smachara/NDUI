<?php
namespace AppBundle\Model;

//use AppBundle\Model\NetworkConfig;
use AppBundle\Entity\NetworkFunction;

/**
 * Created by PhpStorm.
 * User: machar_s
 * Date: 04/11/2016
 * Time: 09:32
 */
class NetworkConfigModel
{
    /**
     * @var int
    *
     */
    protected $id;

    /**
     * @var \AppBundle\Entity\NetworkFunction
     */
    protected $network_function;

    /**
     * @var NetworkConfigModel
     */
    protected $children;




    public function getId()
    {
        return $this->id;
    }

    /**
     * Set networkFunction
     *
     * @param string $networkFunction
     *
     * @return NetworkConfigModel
     */
    public function setNetworkFunction($networkFunction)
    {
        $this->network_function = $networkFunction;

        return $this;
    }

    /**
     * Get networkFunction
     *
     * @return NetworkFunction
     */
    public function getNetworkFunction()
    {
        return $this->network_function;
    }

    /**
    * Add child
    *
    * @param NetworkConfigModel $child
    *
    * @return NetworkConfigModel
    */
    public function addChild(NetworkConfigModel $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param NetworkConfigModel $child
     */
    public function removeChild(NetworkConfigModel $child)
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
     * @param NetworkConfigModel $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }


    function cast($destination, $sourceObject)
    {
        if (is_string($destination)) {
            $destination = new $destination();
        }
        $sourceReflection = new \ReflectionObject($sourceObject);
        $destinationReflection = new \ReflectionObject($destination);
        $sourceProperties = $sourceReflection->getProperties();
        foreach ($sourceProperties as $sourceProperty) {
            $sourceProperty->setAccessible(true);
            $name = $sourceProperty->getName();
            $value = $sourceProperty->getValue($sourceObject);

            if ($destinationReflection->hasProperty($name)) {
                $propDest = $destinationReflection->getProperty($name);
                $propDest->setAccessible(true);
                $propDest->setValue($destination,$value);
            } else {
                $destination->$name = $value;
            }
        }
        return $destination;
    }

}