<?php

namespace App\Http\Controllers;

use App\Interface\ResponseClass;
use App\Models\User;
use App\Models\Categorie;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AcademyDashboardController extends Controller
{
    protected $response;
    public function __construct(ResponseClass $response)
    {
        $this->response = $response;
    }

    public function cardIndicatorsDashboard()
    {
        try {
            $data = [
                [
                    'title' => 'DASHBOARD.CARD_INDICATORS.USERS',
                    'value' => $this->getUsersCount()['value'],
                    'percentage' => $this->getUsersCount()['percentage'],
                    'icon' => 'UserIcon'
                ],
                [
                    'title' => 'DASHBOARD.CARD_INDICATORS.MEDIA',
                    'value' => $this->getMediaFilesCount()['value'],
                    'percentage' => $this->getMediaFilesCount()['percentage'],
                    'icon' => 'VideoCameraIcon'
                ],
                [
                    'title' => 'DASHBOARD.CARD_INDICATORS.CATEGORIES',
                    'value' => $this->getCategoriesCount()['value'],
                    'percentage' => $this->getCategoriesCount()['percentage'],
                    'icon' => 'FolderIcon'
                ],
                [
                    'title' => 'DASHBOARD.CARD_INDICATORS.ROLES',
                    'value' => $this->getRolesCount()['value'],
                    'percentage' => $this->getRolesCount()['percentage'],
                    'icon' => 'UserCircleIcon'
                ],
            ];
            return $this->response->success($data);
        } catch (\Throwable $th) {
            return $this->response->error('An error has occurred' . $th->getMessage());
        }
    }






    // private functions 
    /**
     * @return array with [value, percentage]
     */
    private function getUsersCount()
    {
        $users = User::count();
        // diferencia de usuarios comparados con el mes anterior
        $previousMonth = date('m', strtotime('first day of last month'));
        $usersPreviousMonth = User::whereMonth('created_at', '=', $previousMonth)->count();

        $difference = $users - $usersPreviousMonth;

        return [
            'value' => $users,
            'percentage' => $difference
        ];
    }

    private function getCategoriesCount()
    {
        $categories = Categorie::count();   
        // diferencia de categorías comparadas con el mes anterior
        $previousMonth = date('m', strtotime('first day of last month'));
        $categoriesPreviousMonth = Categorie::whereMonth('created_at', '=', $previousMonth)->count();

        $difference = $categories - $categoriesPreviousMonth;

        return [
            'value' => $categories,
            'percentage' => $difference
        ];
    }

    private function getMediaFilesCount()
    {
        $mediaFiles = MediaFile::count();
        // diferencia de archivos multimedia comparados con el mes anterior
        $previousMonth = date('m', strtotime('first day of last month'));
        $mediaFilesPreviousMonth = MediaFile::whereMonth('created_at', '=', $previousMonth)->count();

        $difference = $mediaFiles - $mediaFilesPreviousMonth;

        return [
            'value' => $mediaFiles,
            'percentage' => $difference
        ];
    }

    private function getRolesCount()
    {
        $roles = Role::count();
        // diferencia de roles comparados con el mes anterior
        $previousMonth = date('m', strtotime('first day of last month'));
        $rolesPreviousMonth = Role::whereMonth('created_at', '=', $previousMonth)->count();

        $difference = $roles - $rolesPreviousMonth;

        return [
            'value' => $roles,
            'percentage' => $difference
        ];
    }
}
