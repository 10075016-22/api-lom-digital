<?php

namespace App\Http\Controllers;

use App\Interface\ResponseClass;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
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
            $categories = Categorie::get();
            return $this->response->success($categories);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred' . $th->getMessage());
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

                $data = Categorie::orderBy('id', 'DESC')
                    ->offset($offset)
                    ->limit($limit)
                    ->get()
                    ->map(function($item) {
                        $item->statusString = $item->status == 1 ? 'Activo' : 'Inactivo';
                        return $item;
                    });
            } else {
                $data = Categorie::orderBy('id', 'DESC')->get()->map(function($item) {
                    $item->statusString = $item->status == 1 ? 'Activo' : 'Inactivo';
                    return $item;
                });
            }

            $total = Categorie::count();
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

            // Validamos si el nombre de la categoría existe
            if (Categorie::where('name', $request->name)->exists()) {
                return $this->response->error('El nombre de la categoría ya existe');
            }

            $category = Categorie::create($request->all());
            return $this->response->success($category);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $category = Categorie::find($id);
            if (!$category) {
                return $this->response->notFound('Category not found');
            }
            return $this->response->success($category);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Categorie::find($id);
            if (!$category) {
                return $this->response->notFound('Category not found');
            }
            $category->update($request->all());
            return $this->response->success($category);
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
            $category = Categorie::find($id);
            if (!$category) {
                return $this->response->notFound('Category not found');
            }
            $category->delete();
            return $this->response->success([]);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred' . $th->getMessage());
        }
    }
}
