<?php

namespace App\Http\Controllers;

use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataEdit\DataEdit;

use App\Interfaces\RapydControllerInterface;
use App\View;
use App\Gift;

class GiftController extends Controller implements RapydControllerInterface
{

    /**
     * @return View
     */
    public function getGrid()
    {
        $grid = \DataGrid::source(Gift::with('partner'));

        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Name');
        $grid->add('price', 'Цена');
        $grid->add('{{ $partner->name }}', 'Магазин', 'name');

        $grid->edit('/gifts/edit', 'Edit', 'show|modify');
        $grid->link('/gifts/edit', "New Article", "TR");

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

        return view('rapyd::demo.grid', compact('grid'));
    }

    /**
     * @return View
     */
    public function getEdit()
    {
        $edit = DataEdit::source(new Gift);

        $edit->add('id', 'ID', 'text')->rule('required');
        $edit->add('name', 'Name', 'text')->rule('required');
        $edit->add('price', 'Цена', 'text')->rule('required');
        $edit->add('partner.name', 'Магазин', 'autocomplete')->search(['name'])->rule('required');
        $edit->add('description', 'Описание', 'textarea')->rule('required');
        $edit->add('logo', 'Логотип', 'image')->rule('required');

        $edit->link('/gifts/grid', "List", "TR");

        return view('rapyd::demo.edit', compact('edit'));
    }
}