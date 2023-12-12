<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\MenuModel;
use App\Models\PesananModel;
use App\Models\RiwayatPesananModel;
use App\Models\TableModel;

class RiwPemController extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->MenuModel = new MenuModel();
        $this->PesananModel = new PesananModel();
        $this->TableModel = new TableModel();
        $this->HistoryModel = new RiwayatPesananModel();
    }

    public function index()
    {
        // Load the default view (all data)

        $data['histories'] = $this->HistoryModel->getAllRecords();

        return view('Admin/RiwayatPesanan/riwayatPesananPage', $data);
    }

    public function viewByMonth($month)
    {
        // Load view for a specific month
        $this->view('Admin/RiwayatPesanan/view_by_month', ['month' => $month]);
    }

    public function viewByQuarter($quarter)
    {
        // Load view for a specific quarter
        $this->view('Admin/RiwayatPesanan/view_by_quarter', ['quarter' => $quarter]);
    }

    public function viewByYear($year)
    {
        // Load view for a specific year
        $this->view('Admin/RiwayatPesanan/view_by_year', ['year' => $year]);
    }

    private function view($view, $data = [])
    {
        // Load common data and display the view
        $RiwayatPesananModel = new RiwayatPesananModel();
        $data['purchaseHistory'] = $RiwayatPesananModel->getAll(); // Replace with your actual model method

        echo view('templates/header', $data); // Assuming you have header and footer templates
        echo view($view, $data);
        echo view('templates/footer', $data);
    }
}
