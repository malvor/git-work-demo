<?php

class User
{
    private string $id;
    private string $renamedUsernameField;
    private string $email;
    private DateTimeImmutable $createdAt;

    public function __construct(
        string $id,
        string $username,
        string $email
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

    public function getEmail(): string
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