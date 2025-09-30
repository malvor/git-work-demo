<?php
declare(strict_types=1);

final readonly class Email
{
    public function __construct(private string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            throw new InvalidArgumentException("Invalid email address: $email");
        }
    }

    public function __toString()
    {
        return $this->email;
    }
}