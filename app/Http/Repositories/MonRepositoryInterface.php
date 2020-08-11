<?php

namespace App\Http\Repositories;

interface MonRepositoryInterface
{
    public function getAll();
    public function create($request);
    public function get($id);
    public function edit($request);
    public function delete($id);
}
