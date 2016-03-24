<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Auth;
use App\Ingredient;
use App\User;

use App\Http\Requests;

class ControllerRecipe extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe = Recipe::orderBy('created_at', 'DESC')->paginate(8);
            
        return view ('recipe.index', compact('recipe'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //take all ingredients with name and id
        $ingredients = Ingredient::lists('name', 'id');
        return view('recipe.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( ! $request->has('ingredient_list')){
            $recipe->ingredients()->detach();
            return;
        }
        
        $ingredients = array();
        foreach ($request->ingredient_list as $ingId){
            if (substr($ingId, 0, 4) == 'new:'){
                $newIng = Ingredient::create(['name' => substr($ingId, 4)]);
                $ingredients[] = $newIng->id;
                continue;
            }
            $ingredients[] = $ingId;
        }
     
        $recipe = Auth::user()->recipe()->create($request->all());
     
        $recipe->ingredients()->attach($ingredients);
        
        return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);

        return view('recipe.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::lists('name', 'id');

        return view('recipe.edit', compact('ingredients', 'recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $input = $request->all();
        $recipe->update($input);
    
        if ( ! $request->has('ingredient_list'))
        {
            $recipe->ingredients()->detach();
            return;
        }
    
        $ingredients = array();
        foreach ($request->ingredient_list as $ingId)
        {
            if (substr($ingId, 0, 4) == 'new:')
            {
                $newIng = Ingredient::create(['name' => substr($ingId, 4)]);
                $ingredients[] = $newIng->id;
                continue;
            }
        $ingredients[] = $ingId;
        }
   
        $recipe->ingredients()->sync($ingredients);
        Session()->flash('flash_message', 'Aggiornato correttamente');
        return redirect()->back();
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        
        return redirect('recipe');
    }
    
    public function search(Request $request)
    {
  	$recipe = Recipe::where('title', 'LIKE', '%' . ($request->search) . '%')->get();
        
    return view('recipe.search', compact('recipe', 'query'));
    }
}
