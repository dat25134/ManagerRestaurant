<?php
namespace App\Http\Repositories;

interface CTKMRepositoryInterface
{
    public function getAll();
    public function create($request);
    public function get($id);
    public function edit($request);
    public function delete($id);
}
