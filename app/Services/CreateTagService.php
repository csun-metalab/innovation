<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\CreateTagContract;
use Helix\Models\Tag;

class CreateTagService implements CreateTagContract
{
    public function createTag($project_id, $tags)
    {
        foreach ($tags as $tag) {
            if(!is_numeric($tag['text'])){
                $newTag = new Tag();
                $newTag->project_id = $project_id;
                $newTag->tag = $tag['text'];
                $newTag->relevance = $tag['relevance'];
                $newTag->category = null;
                $newTag->save();
            }
        }
    }
}
