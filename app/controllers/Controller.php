<?php
namespace App\Controllers;


abstract class Controller{
    abstract protected function index();
    abstract protected function show($id);
    abstract protected function create();
    abstract protected function store();
    abstract protected function update($id);
    abstract protected function delete($id);
    abstract protected function search();
    abstract protected function check();
    abstract protected function changeStatus($id);

}
