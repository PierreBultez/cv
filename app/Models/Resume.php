<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'links' => 'array',
            'experiences' => 'array',
            'education' => 'array',
            'projects' => 'array',
            'skills' => 'array',
        ];
    }
}
