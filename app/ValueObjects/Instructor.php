<?php

namespace App\ValueObjects;

use Carbon\CarbonInterface;
use Illuminate\Contracts\Support\Arrayable;

class Instructor implements Arrayable
{
    private int $id;
    private int $user_id;
    private string $first_name;
    private string $last_name;
    private string $instructor_slug;
    private string $contact_email;
    private string $telephone;
    private ?string $mobile;
    private string $paypal_id;
    private ?string $link_facebook;
    private ?string $link_linkedin;
    private ?string $link_twitter;
    private ?string $link_googleplus;
    private string $biography;
    private string $instructor_image;
    private float $total_credits;
    private CarbonInterface $created_at;
    private CarbonInterface $updated_at;


    public function __construct(
        $id,
        $user_id,
        $first_name,
        $last_name,
        $instructor_slug,
        $contact_email,
        $telephone,
        $mobile,
        $paypal_id,
        $link_facebook,
        $link_linkedin,
        $link_twitter,
        $link_googleplus,
        $biography,
        $instructor_image,
        $total_credits,
        $created_at,
        $updated_at
    )
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->instructor_slug = $instructor_slug;
        $this->contact_email = $contact_email;
        $this->telephone = $telephone;
        $this->mobile = $mobile;
        $this->paypal_id = $paypal_id;
        $this->link_facebook = $link_facebook;
        $this->link_linkedin = $link_linkedin;
        $this->link_twitter = $link_twitter;
        $this->link_googleplus = $link_googleplus;
        $this->biography = $biography;
        $this->instructor_image = $instructor_image;
        $this->total_credits = $total_credits;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getInstructorSlug(): string
    {
        return $this->instructor_slug;
    }

    public function getContactEmail(): string
    {
        return $this->contact_email;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function getPaypalId(): string
    {
        return $this->paypal_id;
    }

    public function getLinkFacebook(): ?string
    {
        return $this->link_facebook;
    }

    public function getLinkLinkedin(): ?string
    {
        return $this->link_linkedin;
    }

    public function getLinkTwitter(): ?string
    {
        return $this->link_twitter;
    }

    public function getLinkGoogleplus(): ?string
    {
        return $this->link_googleplus;
    }

    public function getBiography(): string
    {
        return $this->biography;
    }

    public function getInstructorImage(): string
    {
        return $this->instructor_image;
    }

    public function getTotalCredits(): float
    {
        return $this->total_credits;
    }

    public function getUpdatedAt(): CarbonInterface
    {
        return $this->updated_at;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'instructor_slug' => $this->instructor_slug,
            'contact_email' => $this->contact_email,
            'telephone' => $this->telephone,
            'mobile' => $this->mobile,
            'paypal_id' => $this->paypal_id,
            'link_facebook' => $this->link_facebook,
            'link_linkedin' => $this->link_linkedin,
            'link_twitter' => $this->link_twitter,
            'link_googleplus' => $this->link_googleplus,
            'biography' => $this->biography,
            'instructor_image' => $this->instructor_image,
            'total_credits' => $this->total_credits,
            'updated_at' => $this->updated_at,
        ];
    }

}