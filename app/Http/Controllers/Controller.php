<?php namespace Helix\Http\Controllers;

namespace Helix\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Helix\Models\Project;

/**
 * Additional method to help handle API calls
 *
 * @package Helix\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Structure of API response
     *
     * @param mixed $data The data associated to response
     * @param string $type The data type associated to response
     * @param array|NULL $metadata Any metadata associated to response
     * @return array
     */
    protected function sendResponse($data, $type, array $metadata = NULL)
    {
        $response = [
            'status'   => app('Illuminate\Http\Response')->status(),
            'success'  => app('Illuminate\Http\Response')->status() < 400 ? true : false,
            'version'  => 'innovation-1.0',
            'type'     => $type,
        ];

        if(!is_null($metadata))
        {
            foreach($metadata as $key => $value)
            {
                $response[$key] = $value;
            }
        }

        $response[$type] = $data;

        if(count($data) == 0)
        {
            $response['messages']['data'] = 'No records found.';
        }

        if($response['success'] == false)
        {
            $response['messages']['server'] = 'A server error occurred.';
        }

        return $response;
    }

}
