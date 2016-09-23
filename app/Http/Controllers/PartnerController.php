<?php
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 22.09.2016
 * Time: 16:34
 */

namespace App\Http\Controllers;

use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataEdit\DataEdit;
use App\Partner;

class PartnerController extends Controller
{
    public function getGrid()
    {

        $grid = \DataGrid::source(Partner::with('partnerCategory'));

        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Name');
        $grid->add('logo', 'Logo');
        $grid->add('{{ $partnerCategory->name }}', 'Partner Category', 'name');
        $grid->add('location', 'Адрес');
        $grid->edit('/partners/edit', 'Edit', 'show|modify');
        $grid->link('/partners/edit', "New Article", "TR");
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

    public function getEdit()
    {
        $edit = DataEdit::source(new Partner);
        $edit->add('id', 'ID', 'text')->rule('required');
        $edit->add('name', 'Name', 'text')->rule('required');
        $edit->add('partnerCategory.name', 'Категория', 'autocomplete')->search(['name'])->rule('required');


        $edit->add('location', 'Адрес', 'text')->rule('required');
        $edit->add('description', 'Описание', 'textarea')->rule('required');
        $edit->add('logo', 'Логотип', 'image')->rule('required');




        $edit->link('/partners/grid', "List", "TR");




        return view('rapyd::demo.edit', compact('edit'));
    }
}