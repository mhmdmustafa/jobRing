<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
        public function addEditSection(Request $request,$id=null){
            if ($id==""){
                $title='Add Product';

            }else{
                $title='Edit Product';
            }
            return view('admin.sections.add_edit_section')->with(compact('title'));
        }
}
