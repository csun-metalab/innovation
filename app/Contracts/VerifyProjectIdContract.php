<?php

declare(strict_types=1);

namespace app\Contracts;

interface VerifyProjectIdContract
{
    public function verifyId($projectId);
}
