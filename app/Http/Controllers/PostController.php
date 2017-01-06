<?php
/**
 * Created by PhpStorm.
 * User: ixvil
 * Date: 06.01.2017
 * Time: 4:09
 */

namespace App\Http\Controllers;


use App\Interfaces\RapydControllerInterface;
use App\Models\Post;
use View;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;

class PostController extends Controller implements RapydControllerInterface
{

    /**
     * @return View
     */
    public function getGrid()
    {
        $grid = DataGrid::source(Post::with('partner'));

        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('title', 'Name');
        $grid->add('excerpt', 'Description');
        $grid->add('body', 'Text');
        $grid->add('{{ $partner->name }}', 'Магазин', 'name');

        $grid->edit('/posts/edit', 'Edit', 'show|modify');
        $grid->link('/posts/edit', "New Gift", "TR");

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
        $edit = DataEdit::source(new Post);

        $edit->add('id', 'ID', 'text')->rule('required');
        $edit->add('title', 'Name', 'text')->rule('required');
        $edit->add('excerpt', 'Описание', 'textarea')->rule('required');
        $edit->add('body', 'Text', 'textarea');

        $edit->add('partner.name', 'Магазин', 'autocomplete')->search(['name'])->rule('required');


        $edit->add('image', 'Логотип', 'image')->rule('required');

        $edit->link('/posts/grid', "List", "TR");

        return view('crud/edit', compact('edit'));
    }
}