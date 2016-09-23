<?php

namespace App;

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