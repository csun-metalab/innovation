<?php
namespace Helix\Engines;

use Illuminate\Support\Collection;
use Laravel\Scout\Engines\AlgoliaEngine;

class AdvancedAlgoliaEngine extends AlgoliaEngine
{
    public function map($results, $model)
    {
        if (count($results['hits']) === 0) {
            return Collection::make();
        }

        $keys = collect($results['hits'])->pluck('objectID')->values()->all();

        $models = $model->whereIn(
            $model->getQualifiedKeyName(), $keys
        )->get()->keyBy($model->getKeyName());

        return Collection::make($results['hits'])->map(function ($hit) use ($models) {
            $key = $hit['objectID'];
            if (isset($models[$key])) {
                // Add snippets
                $model = $models[$key];
                if(array_key_exists('_highlightResult',$hit)){
                    $model->setAttribute('_highlightResult', $hit['_highlightResult']);
                }
                if(array_key_exists('_snippetResult',$hit)){
                    $model->setAttribute('_snippetResult', $hit['_snippetResult']);
                }

                return $model;
            }

        })->filter();
    }
}