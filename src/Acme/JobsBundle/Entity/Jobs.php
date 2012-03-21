<?php

namespace Acme\JobsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\JobsBundle\Entity\Job
 *
 * @ORM\Table(name="jobs")
 * @ORM\Entity
 */
class Job
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $userId
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string $jobType
     *
     * @ORM\Column(name="job_type", type="string", length=255, nullable=false)
     */
    private $jobType;

    /**
     * @var string $company
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=false)
     */
    private $company;

    /**
     * @var string $logo
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string $position
     *
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @var string $location
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=4000, nullable=false)
     */
    private $description;

    /**
     * @var string $howToApply
     *
     * @ORM\Column(name="how_to_apply", type="string", length=4000, nullable=false)
     */
    private $howToApply;

    /**
     * @var boolean $isPublic
     *
     * @ORM\Column(name="is_public", type="boolean", nullable=false)
     */
    private $isPublic;

    /**
     * @var boolean $isActivated
     *
     * @ORM\Column(name="is_activated", type="boolean", nullable=false)
     */
    private $isActivated;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var datetime $expiresAt
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=false)
     */
    private $expiresAt;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;



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
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set jobType
     *
     * @param string $jobType
     */
    public function setJobType($jobType)
    {
        $this->jobType = $jobType;
    }

    /**
     * Get jobType
     *
     * @return string 
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * Set company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set logo
     *
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * Set position
     *
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set howToApply
     *
     * @param string $howToApply
     */
    public function setHowToApply($howToApply)
    {
        $this->howToApply = $howToApply;
    }

    /**
     * Get howToApply
     *
     * @return string 
     */
    public function getHowToApply()
    {
        return $this->howToApply;
    }

    /**
     * Set isPublic
     *
     * @param boolean $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
    }

    /**
     * Get isPublic
     *
     * @return boolean 
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * Set isActivated
     *
     * @param boolean $isActivated
     */
    public function setIsActivated($isActivated)
    {
        $this->isActivated = $isActivated;
    }

    /**
     * Get isActivated
     *
     * @return boolean 
     */
    public function getIsActivated()
    {
        return $this->isActivated;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set expiresAt
     *
     * @param datetime $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Get expiresAt
     *
     * @return datetime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set category
     *
     * @param Acme\JobsBundle\Entity\Categories $category
     */
    public function setCategory(\Acme\JobsBundle\Entity\Categories $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Acme\JobsBundle\Entity\Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
