<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MaterialsKeluarModel;
use App\Models\MaterialsMasukModel;
use App\Models\MaterialsModel;
use App\Models\MenuModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\Wizard\Date;

class LaporanStokController extends BaseController
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->MaterialsModel = new MaterialsModel();
        $this->MaterialsMasukModel = new MaterialsMasukModel();
        $this->MaterialsKeluarModel = new MaterialsKeluarModel();
    }

    public function index()
    {
        $data['laporanStok'] = $this->MaterialsModel->findAll();
        $data['tanggal'] = date("Y-m-d H:i:s");

        return view('Admin/LaporanStok/index', $data);
    }

    public function printpdf()
    {
        $dompdf = new Dompdf();

        // Pass data to the view
        $data = [
            'laporanStok' => $this->MaterialsModel->findAll(),
            'tanggal' => date("Y-m-d H:i:s"),
        ];

        // Get data from model based on the filter

        $html = view('Admin/LaporanStok/laporanStokPDF', $data);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_Stok_SushiGo.pdf", array('Attachment' =>
        1));
    }

    public function print()
    {
        // Pass data to the view
        $data = [
            'laporanStok' => $this->MaterialsModel->findAll(),
            'tanggal' => date("Y-m-d H:i:s"),
        ];

        // Get data from model based on the filter

        return view('Admin/LaporanStok/laporanStokPrint', $data);
    }

    public function ExportExcel()
    {
        // Pass data to the view
        $data = [
            'laporanStok' => $this->MaterialsModel->findAll(),
            'tanggal' => date("Y-m-d H:i:s"),
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'LAPORAN STOK BAHAN SUSHIGO');
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'ID');
        $sheet->setCellValue('C3', 'Bahan');
        $sheet->setCellValue('D3', 'Stok');

        $no = 1;
        $numRow = 4;

        foreach ($data['barangMasuk'] as $row) :
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['id']);
            $sheet->setCellValue('C' . $numRow, $row['bahan']);
            $sheet->setCellValue('D' . $numRow, $row['stok']);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('LAPORAN STOK BAHAN SUSHIGO');

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=Laporan_Stok_SushiGo.xlsx");
        header("Cache-Control: max-age=0");

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        return view('Admin/LaporanStok/laporanStokPDF', $data);
    }

    public function barangMasuk()
    {
        // Default filter, current month and year
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'All';
        }

        $data = [
            'barangMasuk' => $this->MaterialsMasukModel->getAllRecords(),
            'selectedMonth' => $selectedMonth,
            'year' => $selectedYear,
        ];

        // Pass the data to the view
        return view('Admin/LaporanStok/ManageStok/BahanMasuk/index', $data);
    }

    public function barangMasukFilter()
    {
        // Default filter, current month and year
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'All';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsMasukModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        $data = [
            'barangMasuk' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'year' => $selectedYear,
        ];

        // Pass the data to the view
        return view('Admin/LaporanStok/ManageStok/BahanMasuk/filterLaporan', $data);
    }

    public function tambahMaterials()
    {
        return view('Admin/LaporanStok/ManageStok/BahanMasuk/tambahStok.php');
    }

    public function saveMaterialsIn()
    {
        $materialsModel = new MaterialsModel();
        $materialsMasukModel = new MaterialsMasukModel();

        $tanggal = $this->request->getPost('tanggal');
        $namaBahan = $this->request->getPost('bahan');
        $jumlahMasuk = (int) $this->request->getPost('jumlah');

        // Periksa apakah bahan sudah ada di tabel materials
        $bahan = $materialsModel->where('bahan', $namaBahan)->first();

        if ($bahan) {
            // Jika bahan sudah ada, tambahkan jumlah masuk ke stok
            $stokBaru = $bahan['stok'] + $jumlahMasuk;
            $materialsModel->update($bahan['id'], ['stok' => $stokBaru]);
        } else {
            // Jika bahan belum ada, tambahkan bahan baru ke tabel materials
            $materialsModel->insert(['bahan' => $namaBahan, 'stok' => $jumlahMasuk]);
        }

        // Tambahkan data ke tabel materials_masuk
        $materialsMasukModel->insert(['tanggal' => $tanggal, 'bahan' => $namaBahan, 'jumlah' => $jumlahMasuk]);

        return redirect()->to(base_url('/laporanMaterialsIn'));
    }

    public function printIn()
    {
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsMasukModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'barangMasuk' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        // Get data from model based on the filter

        return view('Admin/LaporanStok/ManageStok/BahanMasuk/laporanMasukPrint', $data);
    }

    public function printOut()
    {
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsKeluarModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'barangKeluar' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        // Get data from model based on the filter

        return view('Admin/LaporanStok/ManageStok/BahanKeluar/laporanKeluarPrint', $data);
    }

    public function printInpdf()
    {
        $dompdf = new Dompdf();

        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsMasukModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'barangMasuk' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        // Get data from model based on the filter

        $html = view('Admin/LaporanStok/ManageStok/BahanMasuk/laporanMasukPDF', $data);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_Barang_Masuk_SushiGo.pdf", array('Attachment' =>
        1));
    }

    public function printOutpdf()
    {
        $dompdf = new Dompdf();

        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsKeluarModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'barangKeluar' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        // Get data from model based on the filter

        $html = view('Admin/LaporanStok/ManageStok/BahanKeluar/laporanKeluarPDF', $data);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_Barang_Masuk_SushiGo.pdf", array('Attachment' =>
        1));
    }

    public function ExportInExcel()
    {
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsMasukModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsMasukModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'barangMasuk' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'LAPORAN BARANG MASUK SUSHIGO');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Tanggal');
        $sheet->setCellValue('C3', 'No Invoice');
        $sheet->setCellValue('D3', 'Bahan');
        $sheet->setCellValue('E3', 'Jumlah');

        $no = 1;
        $numRow = 4;

        foreach ($data['barangMasuk'] as $row) :
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['tanggal']);
            $sheet->setCellValue('C' . $numRow, $row['id']);
            $sheet->setCellValue('D' . $numRow, $row['bahan']);
            $sheet->setCellValue('E' . $numRow, $row['jumlah']);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('LAPORAN BARANG MASUK SUSHIGO');

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=Laporan_Barang_Masuk_SushiGo.xlsx");
        header("Cache-Control: max-age=0");

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        return view('Admin/LaporanStok/ManageStok/BahanMasuk/laporanMasukExcel', $data);
    }

    public function ExportOutExcel()
    {
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'all';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsKeluarModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        // Pass data to the view
        $data = [
            'barangKeluar' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'LAPORAN BARANG KELUAR SUSHIGO');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Tanggal');
        $sheet->setCellValue('C3', 'No Invoice');
        $sheet->setCellValue('D3', 'Bahan');
        $sheet->setCellValue('E3', 'Jumlah');

        $no = 1;
        $numRow = 4;

        foreach ($data['barangKeluar'] as $row) :
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['tanggal']);
            $sheet->setCellValue('C' . $numRow, $row['id']);
            $sheet->setCellValue('D' . $numRow, $row['bahan']);
            $sheet->setCellValue('E' . $numRow, $row['jumlah']);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('LAPORAN BARANG KELUAR SUSHIGO');

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=Laporan_Barang_Keluar_SushiGo.xlsx");
        header("Cache-Control: max-age=0");

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        return view('Admin/LaporanStok/ManageStok/BahanKeluar/laporanKeluarPDF', $data);
    }

    public function saveMaterialsOut()
    {
        $materialsModel = new MaterialsModel();
        $materialsKeluarModel = new MaterialsKeluarModel();

        $tanggal = $this->request->getPost('tanggal');
        $namaBahan = $this->request->getPost('bahan');
        $sisaStok = (int) $this->request->getPost('jumlah');

        
        // Periksa apakah bahan sudah ada di tabel materials
        $bahan = $materialsModel->where('bahan', $namaBahan)->first();
        
        $kurang = $bahan['stok'] - $sisaStok;

        if ($bahan) {
            // Jika bahan sudah ada, tambahkan jumlah masuk ke stok
            $kurangStok = $bahan['stok'] - $sisaStok;
            $stokBaru = $bahan['stok'] - $kurangStok;
            $materialsModel->update($bahan['id'], ['stok' => $stokBaru]);
        } else {
            // Jika bahan belum ada, tambahkan bahan baru ke tabel materials
            $materialsModel->insert(['bahan' => $namaBahan, 'stok' => $sisaStok]);
        }

        // Tambahkan data ke tabel materials_masuk
        $materialsKeluarModel->insert(['tanggal' => $tanggal, 'bahan' => $namaBahan, 'jumlah' => $kurang]);

        return redirect()->to(base_url('/laporanMaterialsOut'));
    }

    public function barangKeluar()
    {
        // Default filter, current month and year
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'All';
        }

        $data = [
            'barangKeluar' => $this->MaterialsKeluarModel->getAllRecords(),
            'selectedMonth' => $selectedMonth,
            'year' => $selectedYear,
        ];

        // Pass the data to the view
        return view('Admin/LaporanStok/ManageStok/BahanKeluar/index', $data);
    }

    public function barangKeluarFilter()
    {
        // Default filter, current month and year
        $selectedMonth = $this->request->getPost('month');
        $selectedYear = $this->request->getPost('year');

        if (empty($selectedMonth)) {
            $selectedMonth = 'All';
        }

        // Check if "All Records" option is selected
        if ($selectedMonth === 'All') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecords();
            // Handle logic for displaying all records for the selected year
        } elseif ($selectedMonth === 'All Month') {
            $filteredDataIn = $this->MaterialsKeluarModel->getAllRecordsPerYear($selectedYear);
        } else {
            // Handle logic for displaying records for the selected month and year
            $filteredDataIn = $this->MaterialsKeluarModel->getLaporanFiltered($selectedMonth, $selectedYear);
        }

        $data = [
            'barangKeluar' => $filteredDataIn,
            'selectedMonth' => $selectedMonth,
            'year' => $selectedYear,
        ];

        // Pass the data to the view
        return view('Admin/LaporanStok/ManageStok/BahanKeluar/filterLaporan', $data);
    }

    public function kurangMaterials()
    {
        $materialModel = new MaterialsModel();
        $data['materials'] = $materialModel->findAll();

        return view('Admin/LaporanStok/ManageStok/BahanKeluar/kurangStok.php', $data);
    }
}
