<?php

use Cassandra\UuidInterface;

/**
 * Basic User class for Git operations demonstration
 */
class User
{
    private UuidInterface $id;
    private DateTimeInterface $createdAt;

    public function __construct(
        private string $username,
        private string $email
    )
    {
        $this->createdAt = new DateTime();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function setId(UuidInterface $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): bool
    {
        $this->email = $email;

        return true;
    }

    public function getCreatedAt(): DateTime|DateTimeInterface
    {
        return $this->createdAt;
    }

    public function toArray(): array
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
    public function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate username format
     */
    public function validateUsername(string $username): false|int
    {
        // Username should be 3-50 characters, alphanumeric and underscores only
        return preg_match('/^[a-zA-Z0-9_]{3,50}$/', $username);
    }

    /**
     * Get user age from profile (if birthdate is set)
     * @throws DateMalformedStringException
     */
    public function getAge(string $birthdate): ?int
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
    public function isActive($lastLoginTime, $thresholdHours = 24): bool
    {
        if (!$lastLoginTime) {
            return false;
        }

        $lastLogin = new DateTime($lastLoginTime);
        $threshold = new DateTime();
        $threshold->sub(new DateInterval('PT' . $thresholdHours . 'H'));

        return $lastLogin > $threshold;
    }
}
