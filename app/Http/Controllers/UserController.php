<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return "Index Page";
    }
    public function create()
    {
        return "Create Page";
    }
    public function show($id)
    {
        return "Show User $id";
    }
    public function edit($id)
    {
        return "Edit User $id";
    }
    public function delete($id)
    {
        return "Delete User $id";
    }
}
