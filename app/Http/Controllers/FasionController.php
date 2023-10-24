<?php

namespace App\Http\Controllers;

use App\Models\Fasion;
use Illuminate\Http\Request;
use App\Models\Bunrui;
use App\Models\Color;
use App\Models\Brand;

class FasionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        //$fasions = Fasion::latest()->paginate(5);
        $fasions = Fasion::select([
            'f.id',
            'f.name',
            'f.kakaku',
            'r.str as bunrui',
            'c.str as color',
            'b.str as brand',
            'f.path'
        ])
        ->from('fasions as f')
        ->join('bunruis as r',function($join){
            $join->on('f.bunrui','=','r.id');
        })
        ->join('colors as c',function($join){
            $join->on('f.color','=','c.id');
        })
        ->join('brands as b',function($join){
            $join->on('f.brand','=','b.id');
        })
        ->orderBy('f.id','DESC')
        ->paginate(5);

        $select = $request->select;

        switch ($select) {
            case 'a':
                
                $fasions = fasion::get();
                break;
            case 'b':
                
                $fasions = fasion::orderBy('kakaku', 'asc')->get();
                break;
            case 'c':
                
                $fasions = fasion::orderBy('kakaku', 'desc')->get();
                break;
            default :
                
                $fasions = fasion::get();
                break;
        }

        return view('index',compact('fasions','select'))
            ->with('page_id',request()->page)
            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bunruis = Bunrui::all();
        $colors = Color::all();
        $brands = Brand::all();
        return view('create')
            ->with('bunruis', $bunruis)
            ->with('colors', $colors)
            ->with('brands', $brands);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:20',
            'kakaku' =>'required|integer',
            'bunrui' =>'required|integer',
            'color' =>'required|integer',
            'brand' =>'required|integer',
            'img'   =>'required',
        ]);

        $fasion = new Fasion;

        $path = $request->img->store('public');

        $path = basename($path);

        $fasion->name = $request->input(["name"]);
        $fasion->kakaku = $request->input(["kakaku"]);
        $fasion->bunrui = $request->input(["bunrui"]);
        $fasion->color = $request->input(["color"]);
        $fasion->brand = $request->input(["brand"]);
        $fasion->path = $path;
        $fasion->save();

        return redirect()->route('fasion.index')
            ->with('success','服を登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasion $fasion)
    {
        $bunruis = Bunrui::all();
        $colors = Color::all();
        $brands = Brand::all();
        return view('show',compact('fasion'))
            ->with('page_id',request()->page_id)
            ->with('bunruis', $bunruis)
            ->with('colors', $colors)
            ->with('brands', $brands);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasion $fasion)
    {
        $bunruis = Bunrui::all();
        $colors = Color::all();
        $brands = Brand::all();
        return view('edit',compact('fasion'))
            ->with('page_id',request()->page_id)
            ->with('bunruis', $bunruis)
            ->with('colors', $colors)
            ->with('brands', $brands);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasion $fasion)
    {
        $request->validate([
            'name' =>'required|max:20',
            'kakaku' =>'required|integer',
            'bunrui' =>'required|integer',
            'color' =>'required|integer',
            'brand' =>'required|integer',
            'img'   =>'required',
        ]);

        // $fasion = new Fasion;

        $path = $request->img->store('public');
        
        $path = basename($path);

        $fasion->name = $request->input(["name"]);
        $fasion->kakaku = $request->input(["kakaku"]);
        $fasion->bunrui = $request->input(["bunrui"]);
        $fasion->color = $request->input(["color"]);
        $fasion->brand = $request->input(["brand"]);
        $fasion->path = $path;
        $fasion->save();

        return redirect()->route('fasion.index')
            ->with('success','服を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasion $fasion)
    {
        $fasion->delete();
        return redirect()->route('fasion.index')
            ->with('success',$fasion->name.'を削除しました');
    }
}
