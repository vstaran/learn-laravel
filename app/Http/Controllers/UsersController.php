<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController
{
    /**
     * Просмотр пользователя
     *
     * @return string
     */
    public function view($id)
    {
        $url = route('users.view', [
            'user' => $id
        ]);

        return "[GET|HEAD] User View Page / Current URL = " . $url;
    }

    /**
     * Удаление пользователя
     *
     * @return string
     */
    public function delete($id)
    {
        $url = route('users.delete', [
            'user' => $id
        ]);

        return "[DELETE] User Delete Page / Current URL = " . $url;
    }
}
