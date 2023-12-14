<?php

namespace App\Controllers;

// use App\Models\MahasiswaModel;
use Config\View;

class Chartjs extends BaseController
{
    public function index()
    {
        $data['title'] = 'Chart JS';
        $data['activeMenu'] = 'chartjs';

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('chartjs_view', $data);
        echo view('admin_footer');
    }

}
