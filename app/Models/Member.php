<?php

declare(strict_types=1);

namespace Helix;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Member extends Model
{
    use SoftDeletingTrait;
    protected $table = 'members';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'project_id',
        'user_id',
        'position',
        'role',
        'active',
    ];
}
