<?php

namespace App\Controllers;

// use App\Models\MahasiswaModel;
use Config\View;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['activeMenu'] = 'dashboard';

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('dashboard_view', $data);
        // echo view('dataMhs', $data);
        echo view('admin_footer');
    }

}
