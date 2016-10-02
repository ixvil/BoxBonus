<?php
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 25.09.2016
 * Time: 0:29
 */

namespace App\Http\Controllers;


use App\Interfaces\RapydControllerInterface;
use App\Interfaces\View;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use App\Models\User;

class UserController extends Controller implements RapydControllerInterface
{

    /**
     * @return View
     */
    public function getGrid()
    {
        $grid = DataGrid::source(User::with('userType'));
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Name');
        $grid->add('{{ $userType->name }}', 'UserType', 'name');

        $grid->edit('/users/edit', 'Edit', 'show|modify');
        $grid->link('/users/edit', "New User", "TR");

        $grid->orderBy('id', 'desc');
        $grid->paginate(10);


        $grid->row(function ($row) {
            if ($row->cell('id')->value == 20) {
                $row->style("background-color:#CCFF66");
            } elseif ($row->cell('id')->value > 15) {
                $row->cell('title')->style("font-weight:bold");
                $row->style("color:#f00");
            }
        });

        return view('crud/grid', compact('grid'));
    }

    /**
     * @return View
     */
    public function getEdit()
    {
        $edit = DataEdit::source(new User);

        $edit->add('id', 'ID', 'text')->rule('required');
        $edit->add('name', 'Name', 'text')->rule('required');
        $edit->add('userType.name', 'Тип пользователя', 'autocomplete')->search(['name'])->rule('required');

        $edit->link('/users/grid', "List", "TR");

        return view('crud/edit', compact('edit'));
    }
}