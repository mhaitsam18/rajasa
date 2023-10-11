<?php

namespace App\Controllers;

class Login extends BaseController
{
    private $uri;
    private $builderAkun;
    private $builderDesigner;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->builderAkun = new \App\Models\CustomerModel();
        $this->builderDesigner = new \App\Models\DesignerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Masuk',
        ];

        return view('login', $data);
    }

    public function auth()
    {
        $admin      = new \App\Models\AdminModel();
        $designer   = new \App\Models\DesignerModel();
        $customer   = new \App\Models\CustomerModel();

        $session = session();
        $email      = $this->request->getVar('email');
        $password   = $this->request->getVar('password');

        $dataAdmin      = $admin->where('email', $email)->first();
        $dataDesigner   = $designer->where('email', $email)->first();
        $dataCustomer   = $customer->where('email', $email)->first();

        if ($dataAdmin) {
            $pass = $dataAdmin['password'];
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id'        => $dataAdmin['id'],
                    'email'     => $dataAdmin['email'],
                    'tipe'      => $dataAdmin['tipe'],
                    'isLogin'   => true,
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                $session->setFlashdata('error', 'Email dan Password Salah!');
                return redirect()->to(base_url('login'));
            }
        } elseif ($dataDesigner) {
            $pass = $dataDesigner['password'];
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id'        => $dataDesigner['id'],
                    'email'     => $dataDesigner['email'],
                    'tipe'      => $dataDesigner['tipe'],
                    'isLogin'   => true,
                ];
                $session->set($ses_data);

                $queryAkun = $this->builderDesigner;
                $queryAkun->update_status('active');

                return redirect()->to(base_url('designer/dashboard'));
            } else {
                $session->setFlashdata('error', 'Email dan Password Salah!');
                return redirect()->to(base_url('login'));
            }
        } elseif ($dataCustomer) {
            $pass = $dataCustomer['password'];
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id'        => $dataCustomer['id'],
                    'email'     => $dataCustomer['email'],
                    'tipe'      => $dataCustomer['tipe'],
                    'isLogin'   => true,
                ];
                $session->set($ses_data);

                $queryAkun = $this->builderAkun;
                $queryAkun->update_status('active');

                return redirect()->to(base_url('customer'));
            } else {
                $session->setFlashdata('error', 'Email dan Password Salah!');
                return redirect()->to(base_url('login'));
            }
        } else {
            $session->setFlashdata('error', 'Masukkan data yang benar!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentTimestamp = time(); // Get the current timestamp
        $formattedDate = date('n/j/Y, g:i:s A', $currentTimestamp);

        if (session()->get('tipe') == 3) {
            $queryAkun = $this->builderAkun;
            $queryAkun->logoutUser('deactive', $formattedDate);
        } else if (session()->get('tipe') == 2) {
            $queryAkun = $this->builderDesigner;
            $queryAkun->logoutUser('deactive', $formattedDate);
        }

        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    // ANCHOR LUPA PASSWORD
    public function lupaPassword()
    {
        $data = [
            'title' => 'Lupa Password',
        ];

        return view('lupa-password', $data);
    }

    public function lupaPasswordAuth()
    {
        $customer   = new \App\Models\CustomerModel();

        $email      = $this->request->getVar('email');
        $passwordBaru   = $this->request->getVar('passwordBaru');

        $dataCustomer   = $customer->where('email', $email)->first();

        if ($dataCustomer) {
            // Generate Password
            $generatePassword = password_hash($passwordBaru, PASSWORD_DEFAULT);
            $customer->save([
                'id' => $dataCustomer['id'],
                'email' => $email,
                'password' => $generatePassword,
            ]);

            session()->setFlashdata('success', 'Password sudah diperbarui!');
            return redirect()->to(base_url('lupa-password'));
        } else {
            session()->setFlashdata('error', 'Email tidak terdaftar!');
            return redirect()->to(base_url('lupa-password'));
        }
    }
}
