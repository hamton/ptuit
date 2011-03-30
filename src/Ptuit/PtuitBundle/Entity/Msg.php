<?php
namespace Ptuit\PtuitBundle\Entity;

/**
 * @orm:Entity
 */
class Msg {
  /**
   * @orm:id
   * @orm:Column(type="integer")
   * @orm:GeneratedValue(strategy="IDENTITY")
   */
    protected $id;
    
    /**
     * @orm:msg
     * @orm:Column(type="string")
     * @orm:Column(length=160)
     */
    
    protected $msg;
    
    /**
     * @orm:Column(type="datetime", name="created_at")
     */
    
    protected $createdAt;
    
    
    
    /**
     * @orm:userId
     * @orm:Column(type="integer")
     */
    
    protected $userId;
    
    public function __construct()
    {
        $this->createdAt=new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set msg
     *
     * @param string $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Get msg
     *
     * @return string $msg
     */
    public function getMsg()
    {
        return $this->msg;
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
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set iserId
     *
     * @param integer $iserId
     */
    public function setIserId($iserId)
    {
        $this->iserId = $iserId;
    }

    /**
     * Get iserId
     *
     * @return integer $iserId
     */
    public function getIserId()
    {
        return $this->iserId;
    }
}