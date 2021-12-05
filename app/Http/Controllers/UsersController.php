<?php


namespace App\Http\Controllers;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController
{
    /**
     * Регистрация пользователя
     *
     * @return string
     */
    public function register()
    {
        $url = route('users.register');

        return "[POST] User Register Page / Current URL = " . $url;
    }

    /**
     * Авторизация пользователя
     *
     * @return string
     */
    public function login()
    {
        $url = route('users.login');

        return "[POST] User Login Page / Current URL = " . $url;
    }

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
