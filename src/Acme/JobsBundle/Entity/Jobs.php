<?php

namespace Acme\JobsBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Symfony\Component\HttpFoundation\File\UploadedFile;
    
class Jobs
{

    const ACTIVE_DAYS = 30;
    
    public static $types = array(
       'full-time' => 'Full time',
       'part-time' => 'Part time',
       'freelance' => 'Freelance',
    );
    
    public static function getTypes()
    {
        return static::$types;
    }
    
    public static function getTypesValues()
    {
        return array_keys(static::$types);
    }
    
    public function getTypeName()
    {
        return static::$types[$this->getJobType()];
    }
    
    private $file;
    
    private $id;

    private $userId;

    private $jobType;

    private $company;
    
    private $logo;
    
    private $url;
    
    private $position;

    private $location;

    private $description;

    private $howToApply;

    private $isPublic = false;

    private $isActivated = false;

    private $email;

    private $createdAt;

    private $updatedAt;

    private $expiresAt;

    private $category;

    public function setFile(UploadedFile $file) 
    {
        $this->file = $file;
    }
  
    public function getFile()
    {
        return $this->file;
    }
    
    public function setDateTimesOnPersist()
    {
       $this->setCreatedAt(new \DateTime); 
       $createdAt = clone($this->getCreatedAt());
       $this->setExpiresAt($createdAt->modify('+'.self::ACTIVE_DAYS.' days'));
    }
    
    public function setUpdatedAtOnUpdate()
    {
        $this->setUpdatedAt(new \DateTime);
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