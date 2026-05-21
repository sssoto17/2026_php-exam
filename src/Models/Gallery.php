<?php

declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Exception;

#[ORM\Entity]
#[ORM\Table(name: "art")]
class Gallery {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $title;

    #[ORM\Column(type: "string")]
    private string $description;

    #[ORM\Column(type: "string")]
    private string $category;

    #[ORM\Column(type: "string")]
    private string $path;
    
    #[ORM\Column(type: "string")]
    private string $slug;

    #[ORM\Column(type: "integer")]
    private int $user_id;

    #[ORM\Column(type: "integer")]
    private int $is_private;

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $desc): void {
        $this->description = $desc;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function setCategory(string $cat): void {
        $this->category = $cat;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function setUserId(int $id): void {
        $this->user_id = $id;
    }

    public function getPrivate(): int {
        return $this->is_private;
    }

    public function setPrivate(int $private): void {
        $this->is_private = $private;
    }

    public function getSlug(): string {
        return $this->slug;
    }

    public function setSlug(): void {
        $this->slug = str_replace(" ", "-", strtolower($this->getTitle()));
    }

    public function getPath(): string {
        return $this->path;
    }

    public function setPath(): void {
        $img = $_FILES["img"];
        $target_dir = "/media/uploads/";
        $target_file = APP_ROOT . "/public/" . $target_dir . $img["name"];

        if (!file_exists($target_file)) {    
            if ($img["size"] > 6000000) {
                throw new Exception("File is too large. Please choose another.");
                }
                    
            $res = move_uploaded_file($img["tmp_name"], $target_file);
                    
            if (!$res) {
                throw new Exception("An error occurred uploading this file.");
                }
        }
                    
        $this->path = $target_dir . $img["name"];
    }

}