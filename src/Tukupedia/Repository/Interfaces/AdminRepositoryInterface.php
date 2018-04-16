<?php

namespace Tukupedia\Repository\Interfaces;

use Illuminate\Http\Request;

interface AdminRepositoryInterface
{
    public function validator(array $data);

    /**
     * create a user
     */
    public function create(array $data);

    public function store(Request $request);

    /**
     * edit a user
     * @param  string $value [description]
     */
    public function edit($id, array $data);

}
