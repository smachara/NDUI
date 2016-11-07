<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * NetworkFunction
 *
 * @ORM\Table(name="network_function")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NetworkFunctionRepository")
 *
 */
class NetworkFunction
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
     * Attributes for network functions
     * @var array
     * @ORM\Column(name="attributes", type="array", nullable=true)
     */
    protected $attributes = array();


    /**
     * @ORM\ManyToOne(targetEntity="NetworkFunctionRole", cascade={"persist"})
     * @ORM\JoinColumn(name="NetworkFunctionRole_id", referencedColumnName="id")
     * @var String
     */
    private $role;

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
     * @return NetworkFunction
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
     * @return String
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param String $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


}
