<?php

declare(strict_types=1);

namespace App\Models;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "users")]
class User {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;
    #[ORM\Column(type: "string")]
    private string $username;
    #[ORM\Column(type: "string")]
    private string $first_name;
    #[ORM\Column(type: "string")]
    private string $last_name;
    #[ORM\Column(type: "string")]
    private string $email;
    #[ORM\Column(type: "string")]
    private string $password;

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = _validate_username($username);
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void {
        $this->first_name = _validate_name($first_name);
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void {
        $this->last_name = _validate_name($last_name);
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = _validate_email($email);
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(array $params): void {
        $this->password = _validate_password($params["password"], $params["password_confirm"]);
    }

}