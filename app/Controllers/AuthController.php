<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use App\Models\UserModel;

class Authcontroller extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function processRegistration()
    {
        $userModel = new UserModel();

        // Get form input data
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'picture' => $this->request->getPost('picture'),
            'email' => $this->request->getPost('email'),
            'web' => $this->request->getPost('web'),
            'isadmin' => $this->request->getPost('isadmin'),
        ];

        // Insert user data into the database
        $userModel->insert($data);

        // Redirect to login page
        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();

        // Get username and password from the form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Retrieve user data from the database
        $user = $userModel->where('username', $username)->first();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Set user session (you should use a proper authentication mechanism)
            $session = session();
            $session->set('isLoggedIn', true);

            // Redirect to a dashboard or home page
            return redirect()->to('/dashboard');
        } else {
            // Login failed, redirect back to login page with an error message
            return redirect()->to('/login')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        // Clear user session (you should use a proper logout mechanism)
        $session = session();
        $session->remove('isLoggedIn');

        // Redirect to the login page
        return redirect()->to('/login');
    }
}
