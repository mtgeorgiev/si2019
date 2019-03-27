<?php
declare(strict_types=1);

class User
{
    private $id;
    private $username;
    private $password;
    private $registeredOn;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function isValid(): bool
    {
        return $this->username && $this->password;
    }
}