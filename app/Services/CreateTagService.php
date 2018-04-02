<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\CreateTagContract;
use Helix\Models\Tag;

class CreateTagService implements CreateTagContract
{
    public function createTag($tagJson, $project_id, $relevance = 0.5)
    {
        foreach ($tagJson as $tag) {
            if ($tag->relevance >= $relevance) {
                $newTag = new Tag();
                $newTag->project_id = $project_id;
                $newTag->tag = $tag;
                $newTag->relevance = $tag->relevance;
                $newTag->category = null;
                $newTag->save();
            }
        }
    }
}
