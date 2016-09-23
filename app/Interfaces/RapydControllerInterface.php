<?php

namespace App\Interfaces;

interface RapydControllerInterface
{
    /**
     * @return View
     */
    public function getGrid();

    /**
     * @return View
     */
    public function getEdit();

}