<?php
/**
 * Created by PhpStorm.
 * User: machar_s
 * Date: 09/11/2016
 * Time: 15:08
 */

namespace AppBundle\Model;

class NetworkConfigModel
{
    /*
     * @var string
     */
    protected $class2;
    /*
     * @var string
     */
    protected $linkFromPortIdProperty;
    /*
     * @var string
     */
    protected $linkToPortIdProperty;
    protected $nodeDataArray = [];
    protected $linkDataArray = [];

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getLinkFromPortIdProperty()
    {
        return $this->linkFromPortIdProperty;
    }

    /**
     * @param mixed $linkFromPortIdProperty
     */
    public function setLinkFromPortIdProperty($linkFromPortIdProperty)
    {
        $this->linkFromPortIdProperty = $linkFromPortIdProperty;
    }

    /**
     * @return mixed
     */
    public function getLinkToPortIdProperty()
    {
        return $this->linkToPortIdProperty;
    }

    /**
     * @param mixed $linkToPortIdProperty
     */
    public function setLinkToPortIdProperty($linkToPortIdProperty)
    {
        $this->linkToPortIdProperty = $linkToPortIdProperty;
    }

    /**
     * @return array
     */
    public function getNodeDataArray()
    {
        return $this->nodeDataArray;
    }

    /**
     * @param array $nodeDataArray
     */
    public function setNodeDataArray($nodeDataArray)
    {
        $this->nodeDataArray = $nodeDataArray;
    }

    /**
     * @return array
     */
    public function getLinkDataArray()
    {
        return $this->linkDataArray;
    }

    /**
     * @param array $linkDataArray
     */
    public function setLinkDataArray($linkDataArray)
    {
        $this->linkDataArray = $linkDataArray;
    }


}