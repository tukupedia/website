<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Tukupedia\Repository\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    public function edit($id)
    {
        $user = $this->adminRepository->findById($id);

        return view('admin.home.update', [
            'user' => $user,
        ]);
    }

    public function update($id, Request $request)
    {
        return $this->adminRepository->update($id, $request);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        return $this->adminRepository->store($request);
    }
}
