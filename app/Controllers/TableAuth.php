<?php

namespace App\Controllers;

use App\Models\TableModel;
use CodeIgniter\Controller;
use CodeIgniter\Validation\Validation;
use PHPUnit\Framework\SelfDescribing;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TableAuth extends BaseController
{

    public function __construct()
    {
        $this->TableModel = new TableModel();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function TableLogin($id)
    {
        $isLoggedIn = session()->get('isLoggedIn');

        // Jika sudah login, Anda dapat melakukan aksi tambahan
        if ($isLoggedIn) {
            return redirect()->to('/home');
        } else {
            $table = $this->TableModel->find($id);

            return view('User/Table/tableLogin', ['table' => $table]);
        }
    }

    public function Login()
    {
        if ($this->request->getMethod() === 'post') {
            // Check if the submitted username exists in your database
            $table_number = $this->request->getPost('table_number');
            $TableModel = new TableModel();
            $table = $TableModel->cekData($table_number);

            if ($table) {
                // Set user data in the session
                $session = session();
                $session->set('id', $table['id']);
                $session->set('table_number', $table['table_number']);
                $session->set('isLoggedIn', true);

                $TableModel->updateTableStatus($table['id'], 'Aktif');

                // Redirect to the home page or any other page after successful login
                return redirect()->to('/home');
            } else {
                // Redirect to login page with an error message
                return redirect()->to('/login')->with('error', 'Invalid username');
            }
        } else {
            // Display the login form
            return view('User/Table/tableLogin');
        }
    }

    public function logout($id)
    {
        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('id');
        $session->remove('table_number');

        $TableModel = new TableModel();
        $TableModel->deactivateTable($id);

        // Redirect ke halaman setelah logout
        return redirect()->to('/home')->with('message', 'Berhasil Logout');
    }
}
