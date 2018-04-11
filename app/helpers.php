<?php

declare(strict_types=1);
use Carbon\Carbon;
use Helix\Models\Project;

/**
 * Returns an active state if the current URL matches the provided path.
 * Otherwise, this function returns a blank string.
 *
 * @param string $path   The partial path to check against the current URL
 * @param string $active Optional parameter to modify the name of the active
 *                       class that is returned
 *
 * @return string
 */
function setActive($path, $active = 'active')
{
    // Allows me to check for an array of paths
    return \call_user_func_array('Request::is', (array) $path) ? $active : '';
}

function getPages()
{
    return \str_replace('/', ' ', Request::path());
}

/*
 * Creates an Eloquent collection from an array of models.
 */
function collectEloquent($arrayOfModels)
{
    return new \Illuminate\Database\Eloquent\Collection($arrayOfModels);
}

function getImageUploadPath()
{
    return public_path() . '/uploads/imgs';
}
function getImageAfterUploadAndCrop()
{
    // return env('IMAGE_UPLOAD_LOCATION');
    if (env('IMAGE_UPLOAD_LOCATION')) {
        return env('IMAGE_UPLOAD_LOCATION');
    }

    return getImageUploadPath();
}

/**
 * Converts a 24-hour time value to 12-hour time format and returns it.
 *
 * @param string $value Time value in 24-hour format
 *
 * @return string
 */
function convertTime($value)
{
    $value = \str_replace('h', '', $value);
    $date = Carbon::createFromFormat('Gi', $value);
    $date->setToStringFormat('h:i A');

    return $date;
}

/**
 * Returns a URL with the http schema prepended if it does not already exist.
 * If the schema is already there just return the passed parameter.
 *
 * @param string $link The link to check for the schema
 *
 * @return string
 */
function checkHttp($link)
{
    return starts_with($link, 'http') ? $link : 'http://' . $link;
}

/*
 * Returns the numerical part of a model ID string as an integer.
 * @param   string  $modelIdString  [The id of a model in the form: "foobar:123"]
 * @return  integer
 */
function getNumberFromIdString($modelIdString, $delimiter = ':')
{
    return (int) (
        \substr(
            $modelIdString,
            \strpos($modelIdString, $delimiter) + \strlen($delimiter)
        )
    );
}

/*
 * Obfuscate an id string in the form    "${type}${delim}${number}" such that is is still unique.
 * @param  string $id [The id of the model such as "projects:123"]
 * @return string
 */
function obfuscateId($id)
{
    $obfuscated = \hash('md5', $id);

    //Hashes might not be unique, so we append the number-part of id to avoid collisions.
    $obfuscated .= getNumberFromIdString($id);

    return $obfuscated;
}

/**
 * Generates a new project ID.
 */
function generateNewProjectId()
{
    $project = Project::select(DB::raw('CONVERT(REPLACE(project_id, "projects:", ""), UNSIGNED INTEGER) as id'))
          ->orderBy('id', 'DESC')
          ->first();
    if($project == null){
        return 'projects:1';
    }

    return 'projects:' . ++$project->id;
}

/**
 * Generate a new id in fresco.research_interests.
 */
// function generateNewResearchId()
// {
//     $research = Helix\Models\Research::selectRaw("attribute_id, CONVERT(SUBSTRING_INDEX(attribute_id, ':', -1), UNSIGNED INTEGER) AS attribute_id")->orderBy('attribute_id', 'DESC')->first();

//     return 'research:' . ++$research->attribute_id;
// }

/**
 * Generate a new id in fresco.personal_interests.
 *
 * @return string
 */
function generateNewPersonalId()
{
    $personal = Helix\Models\Personal::selectRaw("attribute_id, CONVERT(SUBSTRING_INDEX(attribute_id, ':', -1), UNSIGNED INTEGER) AS attribute_id")->orderBy('attribute_id', 'DESC')->first();

    return 'personal:' . ++$personal->attribute_id;
}

/*
 * Parses the collborator from the view.
 * First item is the id and second is the role.
 *
 */
function parseCollaborator($collaborator)
{
    $str = \explode(',', $collaborator);

    return [\trim($str[0]), \trim($str[1])];
}

function datePickerFormat($date)
{
    return \date('m/d/Y', \strtotime($date));
}
function monthFormat(String $timestamp)
{
    return \date('F-d-Y', \strtotime($timestamp));
}

function timestampFormat($timestamp)
{
    return \date('Y-m-d', \strtotime($timestamp));
}

function getFundingFormat($fund)
{
    $fund = \str_replace(',', '', $fund);

    return $fund;
}

// Returns the project interests as json to populate textbox in Step 2 of project create
function jsonEncodeTags(array $interests)
{
    $projectInterests = [];

    foreach ($interests as $interest) {
        $result = \explode('--', $interest);
        $projectInterest = [
        'id' => $result[0],
        'text' => str_contains($result[0], 'research:') ? $result[1] : $result[0],
        'value' => $result[0] . '--' . $result[1] . (\array_key_exists(2, $result) ? '--' . $result[2] : ''),
      ];

        \array_push($projectInterests, $projectInterest);
    }

    return \json_encode($projectInterests);
}

// This will slugify projects without having future errors
function slugify($text)
{
    // Let's do some string manipulation
    $text = str_slug($text, '-');
    $text = \substr($text, 0, 40);

    // Check to see if there are other projects that have this
    $projects = Project::where('slug', "$text")->get();
    $newColonId = \count($projects);

    // If there is a similar slug, find one that isn't used
    if ($newColonId) {
        $projects = Project::where('slug', 'like', "$text:%")->get();
        while ($projects->contains('slug', $text . ':' . $newColonId)) {
            ++$newColonId;
        }
        $text .= ':' . $newColonId;
    }

    return $text;
}

// Returns the project interests as "id--name"
function stringifyTags(array $interests)
{
    $projectInterests = [];

    foreach ($interests as $interest) {
        \array_push($projectInterests, '' . $interest['attribute_id'] . '--' . $interest['title'] . '');
    }

    return ['tags' => $projectInterests];
}

// Returns the project collaborators as "name,members:id,role_position"
function stringifyCollaborators(array $collaborators)
{
    $members = [];

    foreach ($collaborators as $collaborator) {
        \array_push($members, '' . $collaborator['display_name'] . ',' . $collaborator['user_id'] . ',' . $collaborator['pivot']['role_position'] . '');
    }

    return $members;
}

// PLEASE READ: An object must be passed through to this function, NOT a string
// Example: $model = Model::find(id); updateCount($model);
// Recursive function that updates the interest instance that is passed through and traverses up the tree updating all of the parents as well
function updateCount($interest)
{
    $interest->count = $interest->count + 1;
    $interest->save();

    if ($interest->parent_attribute_id) {
        $model = \get_class($interest);

        $parent = $model::find($interest->parent_attribute_id);

        return updateCount($parent);
    }
}
// Validates the collaborator inputs on Step-3 of project create or update
function collaboratorErrors(array $collaborators)
{
    $errors = [];
    $leadPIs = [];
    $members = [];

    if (empty($collaborators)) {
        \array_push($errors, 'There must be at least one collaborator with the position of Lead Principal Investigator.');
    }

    if (!empty($collaborators)) {
        // Loop through collaborators to see if Lead Principal Investigator role has been included
        // and that there are no duplicates in the collaborators array
        foreach ($collaborators as $collaborator) {
            $results = \explode(',', $collaborator);
            // $results = [name,members:XXXXXX,role_position]

            if (str_contains($collaborator, 'Lead Principal Investigator')) {
                \array_push($leadPIs, $collaborator);
            }

            \array_push($members, \array_shift($results));
        }

        // If there are no PIs included
        if (!\count($leadPIs)) {
            \array_push($errors, 'A Lead Principal Investigator must be included.');
        }

        // If there are members with multiple roles
        if (\count($members) !== \count(\array_unique($members))) {
            \array_push($errors, 'A collaborator may not have more than one position.');
        }
    }

    // Errors are flashed to be displayed on front end - three.blade.php
    session()->flash('errors', $errors);

    return $errors;
}

/**
 *  Creates a very simple acronym or initialisim of a phrase.
 *
 *  @param string|array $words - the phrase from which to make an initialism (e.g. "Los Angeles" or ["Los", "Angeles"]).
 *  @param bool $withPeriods - whether or not to delimit the intiilaism with Periods.
 *
 *  @return string - the initialism (e.g. "LA" or "L.A.").
 */
function simpleAcronym($words, $withPeriods = false)
{
    $result = '';

    if (\is_string($words)) {
        $words = \explode($words, ' ');
    }

    foreach ($words as $word) {
        $result .= $word[0];
        if ($withPeriods) {
            $result .= '.';
        }
    }

    return \strtoupper($result);
}

/**
 * A workaround for an problem with Guzzle6 and PHP 7.1
 * Issues a guzzle call and then returns the data as either
 * an associative array (default) or a PHP object.
 *
 * @param string $url    - The URL of the API to call.
 * @param string $method - (Optional) The HTTP method to use for the guzzle call. Defaults to 'GET'.
 * @param bool   $assoc  - (Optional) Determines the return type of this function.
 *                       True means associative array (default)
 *                       False means PHP object
 *
 * @return array|object - the data returned from the guzzle call.
 */
function guzzleRequest($url, $method = 'GET', $assoc = true)
{
    $data = null;
    $responseJson = null;
    try {
        $client = new \GuzzleHttp\Client();
        // dd($url);
        $responseJson = $client->request($method, $url, ['verify' => false]);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        $responseJson = \json_encode(['success' => false]);
    } finally {
        // $data = \json_decode($responseJson->getBody(), $assoc);
    }

    return $data;
}

/**
 * Handles the Ajax requests for retrieving profile images
 * from the CDN.
 *
 * @param mixed $email
 *
 * @return string
 */
function getProfileImage($email)
{
    $defaultImage = 'http://www.csun.edu/faculty/imgs/profile-default.png';

    // we do this here because the staging database has nr_ prepended to the emails
    if (env('APP_ENV') == 'local') {
        $email = \str_replace('nr_', '', $email);
    }
    $responseData = guzzleRequest(env('DIRECTORY_WEB_SERVICE') . $email);
    // If we successfully obtained the profile image.
    if ($responseData['success'] != 'false' && $responseData['people']['profile_image']) {
        return $responseData['people']['profile_image'];
    }

    return $defaultImage;
}

function getListOfStopWords()
{
    return $stop_words = [
        'a',
        'about',
        'above',
        'after',
        'again',
        'against',
        'all',
        'am',
        'an',
        'and',
        'any',
        'are',
        "aren't",
        'as',
        'at',
        'be',
        'because',
        'been',
        'before',
        'being',
        'below',
        'between',
        'both',
        'but',
        'by',
        "can't",
        'cannot',
        'could',
        "couldn't",
        'did',
        "didn't",
        'do',
        'does',
        "doesn't",
        'doing',
        "don't",
        'down',
        'during',
        'each',
        'few',
        'for',
        'from',
        'further',
        'had',
        "hadn't",
        'has',
        "hasn't",
        'have',
        "haven't",
        'having',
        'he',
        "he'd",
        "he'll",
        "he's",
        'her',
        'here',
        "here's",
        'hers',
        'herself',
        'him',
        'himself',
        'his',
        'how',
        "how's",
        'i',
        "i'd",
        "i'll",
        "i'm",
        "i've",
        'if',
        'in',
        'into',
        'is',
        "isn't",
        'it',
        "it's",
        'its',
        'itself',
        "let's",
        'me',
        'more',
        'most',
        "mustn't",
        'my',
        'myself',
        'no',
        'nor',
        'not',
        'of',
        'off',
        'on',
        'once',
        'only',
        'or',
        'other',
        'ought',
        'our',
        'ours',
        'ourselves',
        'out',
        'over',
        'own',
        'same',
        "shan't",
        'she',
        "she'd",
        "she'll",
        "she's",
        'should',
        "shouldn't",
        'so',
        'some',
        'such',
        'than',
        'that',
        "that's",
        'the',
        'their',
        'theirs',
        'them',
        'themselves',
        'then',
        'there',
        "there's",
        'these',
        'they',
        "they'd",
        "they'll",
        "they're",
        "they've",
        'this',
        'those',
        'through',
        'to',
        'too',
        'under',
        'until',
        'up',
        'very',
        'was',
        "wasn't",
        'we',
        "we'd",
        "we'll",
        "we're",
        "we've",
        'were',
        "weren't",
        'what',
        "what's",
        'when',
        "when's",
        'where',
        "where's",
        'which',
        'while',
        'who',
        "who's",
        'whom',
        'why',
        "why's",
        'with',
        "won't",
        'would',
        "wouldn't",
        'you',
        "you'd",
        "you'll",
        "you're",
        "you've",
        'your',
        'yours',
        'yourself',
        'yourselves',
        'zero',
    ];
}
