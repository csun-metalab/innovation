<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface CreateTagContract
{
    public function createTag($tagJson, $project_id);
}
