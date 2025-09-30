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

    /**
     * Validate email format
     */
    public function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate username format
     */
    public function validateUsername($username)
    {
        // Username should be 3-50 characters, alphanumeric and underscores only
        return preg_match('/^[a-zA-Z0-9_]{3,50}$/', $username);
    }

    /**
     * Get user age from profile (if birthdate is set)
     */
    public function getAge($birthdate)
    {
        if (!$birthdate) {
            return null;
        }

        $birth = new DateTime($birthdate);
        $now = new DateTime();
        return $birth->diff($now)->y;
    }

    /**
     * Check if user is active (logged in recently)
     */
    public function isActive($lastLoginTime, $thresholdHours = 24)
    {
        if (!$lastLoginTime) {
            return false;
        }

        $lastLogin = new DateTime($lastLoginTime);
        $threshold = new DateTime();
        $threshold->sub(new DateInterval('PT' . $thresholdHours . 'H'));

        return $lastLogin > $threshold;
    }

    /**
     * Generate user display name
     */
    public function getDisplayName($firstName = null, $lastName = null)
    {
        if ($firstName && $lastName) {
            return trim($firstName . ' ' . $lastName);
        } elseif ($firstName) {
            return $firstName;
        } else {
            return $this->username;
        }
    }
}
