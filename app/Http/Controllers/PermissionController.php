<?php

namespace App\Http\Controllers;

use App\Interface\ResponseClass;
use App\Models\HeadersTable;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
            $permissions = Permission::get();
            
            // Agregar información del grupo para cada permiso
            $permissions->each(function($permission) {
                $groupPivot = DB::table('group_permission_pivots')
                    ->join('group_permissions', 'group_permission_pivots.group_permission_id', '=', 'group_permissions.id')
                    ->where('group_permission_pivots.permission_id', $permission->id)
                    ->select('group_permissions.name as group_name', 'group_permissions.description as group_description')
                    ->first();
                
                $permission->group_name = $groupPivot ? $groupPivot->group_name : null;
                $permission->group_description = $groupPivot ? $groupPivot->group_description : null;
            });
            
            return $this->response->success($permissions);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }

    public function gridIndex(Request $request) 
    {
        try {
            $params = $request->query();
            $table = Table::whereId($params['nIdTable'])->first() ?? (Object) [];
            $headers = HeadersTable::whereTableId($params['nIdTable'])->orderBy('order')->get();
            $data = Permission::get();
            
            // Agregar información del grupo para cada permiso
            $data->each(function($permission) {
                $groupPivot = DB::table('group_permission_pivots')
                    ->join('group_permissions', 'group_permission_pivots.group_permission_id', '=', 'group_permissions.id')
                    ->where('group_permission_pivots.permission_id', $permission->id)
                    ->select('group_permissions.name as group_name', 'group_permissions.description as group_description')
                    ->first();
                
                $permission->group_name = $groupPivot ? $groupPivot->group_name : null;
                $permission->group_description = $groupPivot ? $groupPivot->group_description : null;
            });

            return $this->response->success([
                'data'  => $data,
                'tabla' => $table,
                'headers' => $headers
            ]);
        } catch (\Throwable $th) {
            return response()->json([]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $permissions = Permission::create($request->all());
            return $this->response->success($permissions);
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
            $permissions = Permission::whereId($id)->get();
            return $this->response->success($permissions);
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
            $permission = Permission::whereId($id)->update($request->all());
            return $this->response->success($permission);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $permission = Permission::find($id);
            if (!$permission) {
                return $this->response->notFound('Permission not found');
            }
            $permission->delete();
            return $this->response->success([]);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }
}
