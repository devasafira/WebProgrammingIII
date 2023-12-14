<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanModel;
use App\Models\RiwayatPesananModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends BaseController
{
    public function __construct()
    {
        $this->HistoryModel = new RiwayatPesananModel();
    }

    private function getMonthName($numericMonth)
    {
        $monthNames = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        return isset($monthNames[$numericMonth]) ? $monthNames[$numericMonth] : 'Invalid Month';
    }

    public function laporanMenuTerbanyak()
    {
        $model = new RiwayatPesananModel();

        // Ambil input periode dari form atau request
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        // Panggil metode pada model untuk menghitung total pembelian per menu
        $data['menuFavorit'] = $model->getTotalPembelianPerMenu($selectedMonth, $selectedYear);

        // Tampilkan view dengan data hasil query
        return view('laporan_menu_terbanyak', $data);
    }

    public function index()
    {
        // Default filter, current month and year
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        // Get month name
        $monthName = $this->getMonthName($selectedMonth);

        if (empty($selectedMonth)) {
            $selectedMonth = 'All';
        }

        $data = [
            'laporan' => $this->HistoryModel->getAllRecords(),
            'selectedMonth' => $selectedMonth,
            'year' => $selectedYear,
            'menuFavorit' => $this->HistoryModel->getTotalPembelianPerMenuAll(),
        ];

        // Pass the data to the view
        return view('Admin/LaporanPenjualan/laporanHarian', $data);
    }

    public function filterLaporan()
    {
        // Get form input values
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'All';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredData = $this->HistoryModel->getAllRecords();
            $filteredDataFav = $this->HistoryModel->getTotalPembelianPerMenuAll();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredData = $this->HistoryModel->getAllRecordsPerYear($selectedYear);
            $filteredDataFav = $this->HistoryModel->getTotalPembelianPerMenuYear($selectedYear);

        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredData = $this->HistoryModel->getLaporanPenjualan($selectedMonth, $selectedYear);
            $filteredDataFav = $this->HistoryModel->getTotalPembelianPerMenu($selectedMonth, $selectedYear);

        }

        // Pass data to the view
        $data = [
            'laporan' => $filteredData,
            'selectedMonth' => $selectedMonth,
            'year' => $selectedYear,
            'menuFavorit' => $filteredDataFav,
        ];

        return view('Admin/LaporanPenjualan/index', $data);
    }

    public function printpdf()
    {
        $dompdf = new Dompdf();

        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredData = $this->HistoryModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredData = $this->HistoryModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredData = $this->HistoryModel->getLaporanPenjualan($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'laporan' => $filteredData,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        // Get data from model based on the filter

        $html = view('Admin/LaporanPenjualan/print/laporanPDF', $data);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_Penjualan_SushiGo.pdf", array('Attachment' =>
        1));
    }

    public function print()
    {
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredData = $this->HistoryModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredData = $this->HistoryModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredData = $this->HistoryModel->getLaporanPenjualan($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'laporan' => $filteredData,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        // Get data from model based on the filter

        return view('Admin/LaporanPenjualan/print/laporanPrint', $data);
    }

    public function ExportExcel()
    {
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredData = $this->HistoryModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredData = $this->HistoryModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredData = $this->HistoryModel->getLaporanPenjualan($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'laporan' => $filteredData,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'LAPORAN PENJUALAN SUSHIGO');
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Tanggal');
        $sheet->setCellValue('C3', 'No Invoice');
        $sheet->setCellValue('D3', 'ID Menu');
        $sheet->setCellValue('E3', 'Nama Menu');
        $sheet->setCellValue('F3', 'Jumlah Penjualan');

        $no = 1;
        $numRow = 4;

        foreach ($data['laporan'] as $row) :
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['tanggal_pembelian']);
            $sheet->setCellValue('C' . $numRow, $row['id']);
            $sheet->setCellValue('D' . $numRow, $row['id_menu']);
            $sheet->setCellValue('E' . $numRow, $row['nama_menu']);
            $sheet->setCellValue('F' . $numRow, $row['jumlah']);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('LAPORAN PENJUALAN SUSHIGO');

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=Laporan_Penjualan_SushiGo.xlsx");
        header("Cache-Control: max-age=0");

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        return view('Admin/LaporanPenjualan/print/laporanExcel', $data);
    }
}
