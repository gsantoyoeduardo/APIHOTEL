<?php
namespace App\Application\Interface;

interface ICabeceraGlobalApplication extends IBaseApplication
{

    public function FilterSearch(array $data): array;
}