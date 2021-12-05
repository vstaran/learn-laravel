<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index()
    {
        $url = route('home.index');

        // Для проверки:
        // В соответствующих методах контроллеров временно возвращать произвольные строки,
        // которые позволит определить, что вашы методы отрабатывает по соответствующим запросам.
        $form = '<h3>Tasks</h3>' .
            $this->getHtmlButton('Index Task', 'tasks.index', 'GET') .
            $this->getHtmlButton('Store Task', 'tasks.store', 'POST') .
            $this->getHtmlButton('Create Task', 'tasks.create', 'GET') .
            $this->getHtmlButton('Show Task (id=10)', 'tasks.show', 'GET', 10) .
            $this->getHtmlButton('Update Task (id=10)', 'tasks.update', 'PUT', 10) .
            $this->getHtmlButton('Destroy Task (id=10)', 'tasks.destroy', 'DELETE', 10) .
            $this->getHtmlButton('Edit Task (id=10)', 'tasks.edit', 'GET', 10) .
                '<h3>Users</h3>' .
            $this->getHtmlButton('User Login', 'users.login', 'POST') .
            $this->getHtmlButton('User Register', 'users.register', 'POST') .
            $this->getHtmlButton('User View (id=42)', 'users.view', 'GET', 42) .
            $this->getHtmlButton('User delete (id=42)', 'users.delete', 'DELETE', 42);

        // TODO - изучить views.blade
        return "Home Page / Current URL = " . $url . $form;
    }

}
