<?php

namespace App\Repositories\Db;

use App\Repositories\InstructorRepository;
use App\ValueObjects\Instructor as InstructorVO;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use DB;

class InstructorsRepositoryDb implements InstructorRepository
{
    public function getActive(int $limit): Collection
    {
        return DB::table('instructors')
            ->select('instructors.*')
            ->join('users', 'users.id', '=', 'instructors.user_id')
            ->where('users.is_active', true)
            ->groupBy('instructors.id')
            ->limit($limit)
            ->get()
            ->map(fn ($instructor) => new InstructorVO(
                $instructor->id,
                $instructor->user_id,
                $instructor->first_name,
                $instructor->last_name,
                $instructor->instructor_slug,
                $instructor->contact_email,
                $instructor->telephone,
                $instructor->mobile,
                $instructor->paypal_id,
                $instructor->link_facebook,
                $instructor->link_linkedin,
                $instructor->link_twitter,
                $instructor->link_googleplus,
                $instructor->biography,
                $instructor->instructor_image,
                $instructor->total_credits,
                Carbon::make($instructor->created_at),
                Carbon::make($instructor->updated_at)
            )
            );
    }
}