<?php
 namespace Ptuit\PtuitBundle\Entity;
  /**
     * @orm:Entity
  */
class User {
    /**
     * @orm:id 
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @orm:pass
     * @orm:Column(type="string",length=128)
     */
    
    protected $pass;
    
    /**
     * @orm:user
     * @orm:Column(type="string", length=12, unique=true)
     */
    protected $user;
    
    /**
     * @orm:email
     * @orm:Column(type="string", length=255, unique=true)
     */
    
    protected $email;

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
     * Set pass
     *
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * Get pass
     *
     * @return string $pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set user
     *
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return string $user
     */
    public function getUser()
    {
        return $this->user;
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
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
}