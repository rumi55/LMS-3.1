<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsGeneral extends Model
{
    use HasFactory;

    public function getUpgradeSkillLogoPathAttribute()
    {
        if ($this->upgrade_skill_logo) {
            return $this->upgrade_skill_logo;
        } else {
            return 'uploads/default/no-image-found.png';
        }
    }

    public function getTeamMemberLogoPathAttribute()
    {
        if ($this->team_member_logo) {
            return $this->team_member_logo;
        } else {
            return 'uploads/default/no-image-found.png';
        }
    }
}
