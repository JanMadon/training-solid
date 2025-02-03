<?php
declare(strict_types=1);

namespace App\Queries;

class CourseListQuery
{
    private ?array $category_ids;
    private ?array $instruction_level_ids;
    private ?array $price_ids;
    private string $sort;
    private ?int $per_page;

    public function __construct(
        ?array $category_ids,
        ?array $instruction_level_ids,
        ?array $price_ids,
        string $sort = 'asc',
        int $per_page = 9
    )
    {
        $this->category_ids = $category_ids;
        $this->instruction_level_ids = $instruction_level_ids;
        $this->price_ids = $price_ids;
        $this->sort = $sort;
        $this->per_page = $per_page;
    }

    public function getCategoryIds(): ?array
    {
        return $this->category_ids;
    }

    public function getInstructionLevelIds(): ?array
    {
        return $this->instruction_level_ids;
    }

    public function getPriceIds(): ?array
    {
        return $this->price_ids;
    }

    public function getSort(): string
    {
        return $this->sort;
    }
    public function getPerPage(): ?int
    {
        return $this->per_page;
    }


}