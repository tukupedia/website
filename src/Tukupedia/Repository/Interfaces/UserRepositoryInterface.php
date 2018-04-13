<?php

namespace Tukupedia\Repository\Interfaces;

interface UserRepositoryInterface
{
    /**
     * create a user
     */
    public function create(array $data);

    /**
     * edit a user
     * @param  string $value [description]
     */
    public function edit($id, array $data);
}
