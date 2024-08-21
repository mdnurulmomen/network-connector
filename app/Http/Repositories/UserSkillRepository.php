<?php

namespace App\Http\Repositories;

use App\Models\UserSkill;
use App\Http\Interfaces\UserSkillRepositoryInterface;

class UserSkillRepository implements UserSkillRepositoryInterface
{
    public function allSkills()
    {
        $query = UserSkill::query();
        
        if (request()->filled('user_id')) {
            $query->where('user_id', request()->user_id);
        }
        
        return $query->latest('id')->paginate(10);
    }

    public function storeSkill($data)
    {
        return UserSkill::firstOrCreate($data);
    }

    public function updateSkill($data, UserSkill $userSkill)
    {
        $userSkill->update($data);
    }

    public function destroySkill(UserSkill $userSkill)
    {
        $userSkill->delete();
    }
}