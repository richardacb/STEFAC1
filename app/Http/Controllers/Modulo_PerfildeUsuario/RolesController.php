<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roles = Role::all();

       return view('Modulo_PerfildeUsuario.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('Modulo_PerfildeUsuario.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:roles',
         ];
         $messages = [
            'name.required' =>'Campo Requerido',
            'name.unique' => 'Campo Único',
         ];
         $this->validate( $request, $rules, $messages);

         $roles=Role::create($request->all());

         $roles->permissions()->sync($request->permissions);

        return redirect()->route('roles.index', compact('roles'))->with('info', 'adicionar-role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('Modulo_PerfildeUsuario.roles.edit', compact('roles', 'permissions'));
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
        $roles = Role::findOrFail($id);

        $rules = [
            'name' => "required|unique:roles,name,$roles->id",
         ];
         $messages = [
            'name.required' =>'Campo Requerido',
            'name.unique' => 'Campo Único',
         ];
         $this->validate( $request, $rules, $messages);

          $roles->update($request->all());

         $roles->permissions()->sync($request->permissions);

        return redirect()->route('roles.index', compact('roles'))->with('info', 'modificar-role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::findOrFail($id);

        $roles->delete();

        return redirect()->route('roles.index')->with('info', 'eliminar-role');
    }
}