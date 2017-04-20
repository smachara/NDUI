<?php
/**
 * Created by PhpStorm.
 * User: machar_s
 * Date: 20/04/2017
 * Time: 10:31
 */


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use AppBundle\Entity\NetworkFunctionRole;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Symbol
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    public $id;

    /**
     * @ORM\OneToOne(targetEntity="NetworkFunctionRole", inversedBy="symbol")
     * @ORM\JoinColumn(name="networkFunctionRole_id", referencedColumnName="id")
     * @var NetworkFunctionRole
     */
    protected $networkFunctionRole;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    /**************************************************************************************************/
    /**************************************************************************************************/
    /**************************************************************************************************/
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
     * Set networkFunctionRole
     *
     * @param \AppBundle\Entity\NetworkFunctionRole $networkFunctionRole
     *
     * @return NetworkFunctionRole
     */
    public function setNetworkFunctionRole(\AppBundle\Entity\NetworkFunctionRole $networkFunctionRole = null)
    {
        $this->networkFunctionRole = $networkFunctionRole;

        return $this;
    }

    /**
     * Get networkFunctionRole
     *
     * @return \AppBundle\Entity\NetworkFunctionRole
     */
    public function getNetworkFunctionRole()
    {
        return $this->networkFunctionRole;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Symbol
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**************************************************************************************************/
    /**
     * @Assert\File(maxSize="6000000")
     */
    /**
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "error.maxsize_image",
     *     mimeTypesMessage = "error.filetypes_image"
     * )
     */

    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /********************************************************************************************************/
    /********************************************************************************************************/
    /********************************************************************************************************/
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->id.'.'.$this->path; //.'/'.$this->path;
    }


    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // Photos should be saved
        $s = false === strpos(__DIR__, "/") ? "\\" : "/";
        return str_replace($s."src".$s."AppBundle".$s."Entity",$s."htdocs".$s,__DIR__).$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/Symbol';
    }
    /***********************************************************************************************/
    /***********************************************************************************************/
    /***********************************************************************************************/
    private $temp;
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $this->path = $this->getFile()->guessExtension();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->getFile()->guessExtension()
        );

        $this->setFile(null);
    }
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            unlink($this->temp);
        }
    }
    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }
}
