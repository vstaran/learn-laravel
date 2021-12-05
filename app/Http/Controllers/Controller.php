<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * TODO перенос в views
     *
     * @param $name
     * @param $routeName
     * @param $method POST|GET|DELETE|PUT
     * @param array $params
     * @return string
     */
    public function getHtmlButton($name, $routeName, $method, $params = [])
    {
        $button = '';
        switch ($method) {
            case "GET":
                $button = '<a href="' . route($routeName, $params) . '"><button>' . $name . '</button></a><br><br>';
                break;

            case "POST":
                $button = '<form method="' . $method . '" action="' . route($routeName, $params) . '">' .
                                csrf_field() .
                                '<input type="submit" value="' . $name . '">' .
                          '</form>';
                break;

            case "PUT":
            case "DELETE":
                $button = '<form method="POST" action="' . route($routeName, $params) . '">' .
                                csrf_field() .
                                method_field($method) .
                                //'<input type="hidden" name="_method" value="' . $method . '">' .
                                '<input type="submit" value="' . $name . '">' .
                          '</form>';
        }

        return $button;
    }

}
