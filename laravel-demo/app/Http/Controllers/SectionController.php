<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section;

class SectionController extends Controller
{
    //
    public function index(){
        $sections = Section::all();
        return view('section.section', ['sections' => $sections]);
    }

    public function create(){
        return view('section.create');
    }

    public function store(Request $request){        
        $data = $request->validate([
            'name' =>'required|max:255',
            'academic_year' =>'required|integer|between:1000,9999',
            'description' => 'nullable',
        ]);

        $newSection = Section::create($data);

        return redirect(route('section.section'))->with('success', 'Section created successfully');

    }

    public function edit(Section $section){
        return view('section.edit', ['section' => $section]);
    }

    public function update(Section $section, Request $request){
        $data = $request->validate([
            'name' =>'required|max:255',
            'academic_year' =>'required|integer|between:1000,9999',
            'description' => 'nullable',
        ]);

        $section->update($data);

        return redirect(route('section.section'))->with('success', 'Section updated successfully');
    }

    public function delete(Section $section){
        $section->delete();
        return redirect(route('section.section'))->with('success', 'Section deleted successfully');
    }

}
