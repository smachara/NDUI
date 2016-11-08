<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
//use AppBundle\Model\NetworkConfigModel;
/**
 * NetworkConfig
 *
 * @ORM\Table(name="network_config")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NetworkConfigRepository")
 *
 */
class NetworkConfig  //extends NetworkConfigModel
{
    private $data = <<<EOT
              { "class": "go.GraphLinksModel",
                    "linkFromPortIdProperty": "fromPort",
                    "linkToPortIdProperty": "toPort",
                    "nodeDataArray": [],
                    "linkDataArray": []
                }
EOT;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var String
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @var String
     */
    protected $description;

    /**
     * @ORM\Column(type="text")
     * @var String
     */
    protected $config_value;

    /**
     * NetworkConfig constructor.
     * @param String $config_value
     */
    public function __construct()
    {
        $this->config_value = $this->data;
    }

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
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return String
     */
    public function getConfigValue()
    {
        return $this->config_value;
    }

    /**
     * @param String $config_value
     */
    public function setConfigValue($config_value)
    {
        $this->config_value = $config_value;
    }


}