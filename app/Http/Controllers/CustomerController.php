<?php
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 25.09.2016
 * Time: 1:21
 */

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Interfaces\RapydControllerInterface;
use App\Interfaces\View;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;

class CustomerController extends Controller implements RapydControllerInterface
{

    /**
     * @return View
     */
    public function getGrid()
    {
        $grid = DataGrid::source(Customer::with("user"));

        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('walletId', 'Номер кошелька');
        $grid->add('balance', 'Баланс');
        $grid->add('{{ $user->name }}', 'Пользователь', 'name');

        $grid->edit('/customers/edit', 'Edit', 'show|modify');
        $grid->link('/customers/edit', "New Customer", "TR");

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
        $edit = DataEdit::source(new Customer);

        $edit->add('id', 'ID', 'text')->rule('required');
        $edit->add('walletId', 'Номер кошелька', 'text')->rule('required');
        $edit->add('balance', 'Баланс', 'text')->rule('required');
        $edit->add('user.name', 'Пользователь', 'autocomplete')->search(['name'])->rule('required');

        $edit->link('/customers/grid', "List", "TR");

        return view('crud/edit', compact('edit'));
    }
}