<?php

namespace App\Http\Controllers;

use App\Interface\ResponseClass;
use App\Models\HeadersTable;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $response;
    public function __construct(ResponseClass $response)
    {
        $this->response = $response;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $roles = Role::get();
            return $this->response->success($roles);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }

    public function indexDatatable(Request $request) 
    {
        try {
            $params = $request->query();

            if(isset($params['page']) && isset($params['limit'])) {
                $page  = max(1, intval($params['page']));
                $limit = max(1, intval($params['limit']));
                $offset = ($page - 1) * $limit;

                $data = Role::orderBy('id', 'DESC')
                    ->offset($offset)
                    ->limit($limit)
                    ->get();
            } else {
                $data = Role::orderBy('id', 'DESC')->get();
            }

            $total = Role::count();
            return $this->response->success([
                'data'  => $data,
                'total' => $total
            ]);
        } catch (\Throwable $th) {
            return $this->response->error('Ha ocurrido un error');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validamos campos requeridos
            if (!$request->has('name') || empty($request->name)) {
                return $this->response->error('El campo name es requerido');
            }

            if (!$request->has('permissions') || !is_array($request->permissions) || empty($request->permissions)) {
                return $this->response->error('El array de permissions es requerido');
            }

            // Validamos si el nombre del rol existe
            if (Role::where('name', $request->name)->exists()) {
                return $this->response->error('El nombre del rol ya existe');
            }

            $role = Role::create(['name' => $request->name]);

            $role->syncPermissions($request->permissions); // Asignamos los permisos al rol

            return $this->response->success($role, 'Perfil creado correctamente');
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $role = Role::with(['permissions' => function($query) {
                $query->select('id', 'name', 'alias');
            }])->find($id);
            
            // Agregar información del grupo para cada permiso
            if ($role && $role->permissions) {
                $role->permissions->each(function($permission) {
                    $groupPivot = DB::table('group_permission_pivots')
                        ->join('group_permissions', 'group_permission_pivots.group_permission_id', '=', 'group_permissions.id')
                        ->where('group_permission_pivots.permission_id', $permission->id)
                        ->select('group_permissions.name as group_name', 'group_permissions.description as group_description')
                        ->first();
                    
                    $permission->group_name = $groupPivot ? $groupPivot->group_name : null;
                    $permission->group_description = $groupPivot ? $groupPivot->group_description : null;
                });
            }
            
            return $this->response->success($role);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // En el request llega name:string y permissions:array de ids de permisos
            $role = Role::find($id);

            if (!$role) {
                return $this->response->error('El rol no existe');
            }

            $role->update([
                'name' => $request->name
            ]);

            $role->syncPermissions($request->permissions); // aunque llegue vacio

            return $this->response->success($role, 'Perfil actualizado correctamente');
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $role = Role::find($id);
            if (!$role) {
                return $this->response->error('The record does not exist');
            }
            $role->delete();
            return $this->response->success([]);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }
}
