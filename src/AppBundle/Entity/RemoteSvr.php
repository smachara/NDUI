<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemoteSvr
 *
 * @ORM\Table(name="remote_svr")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RemoteSvrRepository")
 */
class RemoteSvr
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
     * @ORM\Column(name="last_config", type="text", nullable=true)
     */
    private $lastConfig;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_config_date", type="datetimetz", nullable=true)
     */
    private $lastConfigDate;


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
     * @return RemoteSvr
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
     * Set lastConfig
     *
     * @param string $lastConfig
     *
     * @return RemoteSvr
     */
    public function setLastConfig($lastConfig)
    {
        $this->lastConfig = $lastConfig;

        return $this;
    }

    /**
     * Get lastConfig
     *
     * @return string
     */
    public function getLastConfig()
    {
        return $this->lastConfig;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return RemoteSvr
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set lastConfigDate
     *
     * @param \DateTime $lastConfigDate
     *
     * @return RemoteSvr
     */
    public function setLastConfigDate($lastConfigDate)
    {
        $this->lastConfigDate = $lastConfigDate;

        return $this;
    }

    /**
     * Get lastConfigDate
     *
     * @return \DateTime
     */
    public function getLastConfigDate()
    {
        return $this->lastConfigDate;
    }
}

