<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\RoleRepository;

class RolesController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $roles = $this->roleRepository->allRoles();
       
       return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        return view('roles.create', compact('states', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\RoleRequest $request)
    {
        $input = $request->all();

        $input['role_title'] = strtoupper($input['role_title']);

        $role = $this->roleRepository->storeRole($input);
      
        return redirect('roles');
    }
    
    public function show($id, RoleRepository $roleRepository)
    {
        $role = $this->roleRepository->findRoleById($id);

        $role_permissions = array(''=>'') + $roleRepository
            ->allNewPermissionsByRoleId($id)
            ->lists('permission_title', 'id')
            ->all();

        $role_users = array(''=>'') + $roleRepository
            ->allNewUsersByRoleId($id)
            ->lists('name', 'id')
            ->all();

        return view('roles.show', compact('role', 'role_permissions', 'role_users'));
    }

    public function edit($id)
    {
        $role = $this->roleRepository->findRoleById($id);
        
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\RoleRequest $request, $id)
    {
        $input = $request->all();

        $input['role_title'] = strtoupper($input['role_title']);
                
        $role = $this->roleRepository->findRoleById($id);
        $role->update($input);

        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->roleRepository->findRoleById($id)->delete();

        return redirect('roles');
    }

    public function permission_store($id, RoleRepository $roleRepository, Requests\PermissionRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->findRoleById($id);
        $role->permissions()->attach($input['permission_id']);

        return redirect()->route('roles.show', ['id' => $id]);
    }

    public function permission_destroy($id, $permission_id, RoleRepository $roleRepository)
    {
        $role = $this->roleRepository->findRoleById($id);
        
        $role->permissions()->dettach($permission_id);

        return redirect()->route('roles.show', ['id' => $id]);

    }

    public function user_store($id, RoleRepository $roleRepository, Requests\RoleUserRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->findRoleById($id);
        $role->users()->attach($input['user_id']);

        return redirect()->route('roles.show', ['id' => $id]);
    }

    public function user_destroy($id, $user_id, RoleRepository $roleRepository)
    {
        $role = $this->roleRepository->findRoleById($id);
        $role->users()->dettach($user_id);

        return redirect()->route('roles.show', ['id' => $id]);
    }

}