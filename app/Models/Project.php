<?php

namespace App\Models;

use App\Http\Filter\ProjectFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Timedoor\Filter\FilterTrait;

class Project extends Model
{
    use HasFactory, FilterTrait;

    protected $filterClass = ProjectFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'token',
        'access_token',
    ];

    /**
     * Get the files for the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'project_id');
    }
}
