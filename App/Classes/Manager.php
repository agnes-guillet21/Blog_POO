<?php


namespace App\Classes;


interface Manager
{
    public function getAll();

    public  function getById(int $param);

    public function add(array $values);

    public function edit(array $values, int $id);

    public function delete(int $param);
}