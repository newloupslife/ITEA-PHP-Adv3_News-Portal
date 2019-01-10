<?php

namespace App\Dto;

final class PartnerPost
{
    private $title;
    private $description;
    private $link;

    public function __construct(string $title, string $description, string $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return \strip_tags($this->description);
    }

    public function getLink(): string
    {
        return $this->link;
    }
}
