<?php

namespace App\Http\Filter;

use App\Models\Project;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Timedoor\Filter\Filter;

class ProjectFilter extends Filter
{
    /**
     * Filter by name.
     *
     * @param mixed $value
     * @return Builder<Project>
     */
    public function query(mixed $value): Builder
    {
        return $this->query->where('name', 'like', "%{$value}%");
    }
}
