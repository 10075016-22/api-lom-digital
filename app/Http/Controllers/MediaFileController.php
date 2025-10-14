<?php

namespace App\Http\Controllers;

use App\Interface\ResponseClass;
use App\Models\AtachmentMedia;
use App\Models\Categorie;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaFileController extends Controller
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
            $mediaFiles = MediaFile::with('user', 'category')->get();
            return $this->response->success($mediaFiles);
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

                $data = MediaFile::with(['user', 'category'])
                    ->orderBy('id', 'DESC')
                    ->offset($offset)
                    ->limit($limit)
                    ->get()
                    ->map(function($item) {
                        $item->categoryName = $item->category->name;
                        $item->userName = $item->user->name;
                        $item->url = Storage::disk('media_files')->url($item->path);
                        $item->statusString = $item->status == 1 ? 'Activo' : 'Inactivo';
                        return $item;
                    });
            } else {
                $data = MediaFile::with(['user', 'category'])->orderBy('id', 'DESC')->get()->map(function($item) {
                    $item->categoryName = $item->category->name;
                    $item->userName = $item->user->name;
                    $item->url = Storage::disk('media_files')->url($item->path);
                    $item->statusString = $item->status == 1 ? 'Activo' : 'Inactivo';
                    return $item;
                });
            }

            $total = MediaFile::count();
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
     * @param Request $request
     */
    public function store(Request $request)
    {
        try { 
            // categoria
            $category = Categorie::find($request->category_id);
            if (!$category) {
                return $this->response->notFound('Category not found');
            }
            
            // subir archivo a la storage categoria/nombre_archivo
            if (!$request->hasFile('file')) {
                return $this->response->error('File not found');
            }

            $file = $request->file('file');
            $path = $file->store($category->name, 'media_files');

            // validamos que en el formData del request exista un campo attachments 
            // Esta campo llega asì attachments[0][title], attachments[0][description], attachments[0][file] es decir un array de attachments

            $mediaFile = MediaFile::create([
                'user_id'     => $request->user_id,
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'description' => $request->description,
                'tags' => $request->tags,
                'size' => $file->getSize(), // en bytes
                'path' => $path
            ]);


            // se valida si viene attachments - sino no pasa nada
            if ($request->has('attachments')) {
                // Se recorre el array de attachments
                foreach ($request->attachments as $attachment) {
                    // se valida el tipo 
                    if ($attachment['type'] == 'file') {
                        $attachmentFile = $attachment['file'];
                        $attachmentPath = $attachmentFile->store($category->name, 'media_files');
                    }
                    if ($attachment['type'] == 'link') {
                        $attachmentPath = $attachment['url'];
                    }
                    // se crea el archivo adjunto
                    AtachmentMedia::create([
                        'media_file_id' => $mediaFile->id,
                        'title'         => $attachment['title'],
                        'description'   => $attachment['description'],
                        'path'          => $attachmentPath,
                    ]);
                }
            }

            return $this->response->success($mediaFile);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $mediaFile = MediaFile::with('user', 'category')->find($id);
            if (!$mediaFile) {
                return $this->response->notFound('Media file not found');
            }
            return $this->response->success($mediaFile);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $mediaFile = MediaFile::find($id);
            if (!$mediaFile) {
                return $this->response->notFound('Media file not found');
            }
            // borrar archivo de la storage
            Storage::disk('media_files')->delete($mediaFile->path);
            // borrar archivo de la base de datos
            $mediaFile->delete();
            return $this->response->success([]);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred');
        }
    }
}
