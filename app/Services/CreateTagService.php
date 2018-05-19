<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\CreateTagContract;
use Helix\Models\Tag;

class CreateTagService implements CreateTagContract
{
    public function createTag($project_id, $updatedTags)
    {
        $oldTags = Tag::where('project_id',$project_id)
                        ->where('relevance', '>' , env('WATSON_RELEVANCE_MIN'))
                        ->pluck('id')->toArray();

        $updatedTagText = array_column($updatedTags, 'text');
        $deleteTagIds = array_diff($oldTags, $updatedTagText);

        if(count($deleteTagIds)){
            Tag::whereIn('id',$deleteTagIds)->delete();
        }
        foreach ($updatedTags as $tag) {
            if( !$tag['stored'] && !in_array($tag['text'], $oldTags)){
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
