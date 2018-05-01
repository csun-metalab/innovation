<?php

namespace Helix;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class MemberTitle extends Model
{
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    protected $fillable = [
      'user_id',
      'title_name'
    ];
}
