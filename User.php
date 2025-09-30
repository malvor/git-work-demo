<?php

class User
{
    private readonly string $id;
    private string $renamedUsernameField;
    private Email $email;
    private DateTimeImmutable $createdAt;

    public function __construct(
        string $id,
        private readonly int $age,
        string $username,
        Email $email
    ) {
        $this->renamedUsernameField = $username;
        $this->email = $email;
        $this->createdAt = new DateTimeImmutable();
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }


    public function getRenamedUsernameField(): string
    {
        return $this->renamedUsernameField;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->renamedUsernameField,
            'email' => $this->email,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s')
        ];
    }
}