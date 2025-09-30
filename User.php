<?php

/**
 * Basic User class for Git operations demonstration
 */
class User
{
    private $id;
    private $username;
    private $email;
    private $createdAt;

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
        $this->createdAt = new DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s')
        ];
    }
}