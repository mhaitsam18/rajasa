<?php

namespace App\Controllers;

class Chat extends BaseController
{

    private $builderProduk;
    private $builderKategori;
    private $builderMessage;
    private $builderDesainer;
    private $uri;
    private $builderAkun;
    private $tipe_login;

    public function __construct()
    {
        $this->builderDesainer = new \App\Models\DesignerModel();
        $this->builderMessage = new \App\Models\MessageModel();
        $this->builderProduk = new \App\Models\ProdukModel();
        $this->builderKategori = new \App\Models\KategoriModel();
        $this->uri = service('uri');
        $this->builderAkun = new \App\Models\CustomerModel();

        $this->tipe_login =  session()->get('tipe');
    }

    public function index()
    {
        // KATEGORI
        $queryKategori = $this->builderKategori;
        $kategori = $queryKategori->get()->getResult();


        // $tipe_login = session()->get('tipe');

        // Print or process the session data as needed
        // print_r($sessionData);

        if ($this->tipe_login === '2') {
            $akun = $this->builderDesainer->find(session()->get('id'));
        } else {
            $akun = $this->builderAkun->find(session()->get('id'));
        }

        // var_dump($akun);
        // die();




        $data = [
            'title' => 'Rajasa Finishing',
            'keyword'  => null,
            'akun' => $akun,
            'kategori' => $kategori,
        ];

        return view('customer/message', $data);
    }

    public function allUser()
    {


        $queryDesainer = $this->builderDesainer;
        $queryCustomer = $this->builderAkun;


        if ($this->tipe_login === '2') {
            // All Designer because login as designer
            $all_user = $queryCustomer->get()->getResultArray();
        } else {
            // All Designer because login as customer
            $all_user = $queryDesainer->get()->getResultArray();
        }

        // Chat
        $queryChat = $this->builderMessage;

        $data['data'] = $all_user;

        $data['last_msg'] = array();
        helper('url');
        if (!is_array($data['data'])) {
            echo "<p class='text-center'>No user available.</p>";
        } else {
            $count = count($data['data']);
            // var_dump($count);
            // die();
            for ($i = 0; $i < $count; $i++) {
                $unique_id = $data['data'][$i]['id'];
                // var_dump($unique_id);
                // die();
                $msg = $queryChat->getLastMessage($unique_id);




                for ($j = 0; $j < count($msg); $j++) {

                    $time = explode(" ", $msg[0]['time']); //00:00:00.0000
                    $time = explode(".", $time[1]); //00:00:00
                    $time = explode(":", $time[0]); //00 00 00
                    if ((int)$time[0] == 12) {
                        $time = $time[0] . ":" . $time[1] . " PM";
                    } elseif ((int)$time[0] > 12) {
                        $time = ($time[0] - 12) . ":" . $time[1] . " PM";
                    } else {
                        $time = $time[0] . ":" . $time[1] . " AM";
                    }

                    // var_dump($time);
                    // die();
                    // var_dump($msg[0]['receiver_message_id']);

                    array_push($data['last_msg'], array(
                        'message' => $msg[0]['message'],
                        'sender_id' => $msg[0]['sender_message_id'],
                        'receiver_id' => $msg[0]['receiver_message_id'],
                        'time' => $time //00:00
                    ));

                    // var_dump($time);
                    // die();
                }
            }
            // die();

            // var_dump($data['last_msg']);
            // die();

            return view('customer/sampleDataShow', $data);
        }
    }

    public function getIndividual($id)
    {
        // $request = \Config\Services::request();

        $queryDesainer = $this->builderDesainer;
        $queryCustomer = $this->builderAkun;


        if ($this->tipe_login === '2') {
            // Find Designer because login as designer
            $returnVal = $queryCustomer->getIndividual($id);
        } else {
            // Find Designer because login as customer
            $returnVal = $queryDesainer->getIndividual($id);
        }



        // $returnVal = $queryDesainer->getIndividual($id);
        // print_r(json_encode($returnVal, true));

        return $this->response->setJSON($returnVal);
    }

    public function setNoMessage()
    {

        // $data = $this->request->getPost('data');
        // $bg_image = $this->request->getPost('bg_image');

        // if (strlen($data) > 5) {
        //     // Assuming 'chat_message_area' is an HTML element on the client-side
        //     // You can return the data as JSON or HTML based on your requirement
        //     return $this->response->setJSON($data);
        // } else {
        //     $profileName = $this->request->getPost('profileName');
        //     // Load the model and perform the necessary action, for example:
        //     $res_data = $this->setMessageNoMessage($bg_image, $profileName);

        //     // You can return the data as JSON or HTML based on your requirement
        //     return $this->response->setJSON($res_data);
        // }

        $data['image'] = $this->request->getPost('image');
        $data['name'] = $this->request->getPost('name');
        return view('customer/notmessageyet', $data);
    }


    public function getMessage()
    {

        // $session_id = session()->get('id');

        if ($this->request->getPost('data') && session()->get('id')) {

            $queryChat = $this->builderMessage;

            $data['data'] = $queryChat->getmessage($this->request->getPost('data'));
            $data['image'] = $this->request->getPost('image');
            return view('customer/sampleMessageShow', $data);
        }

        // return $this->response->setJSON($data['data']);
    }

    public function sendMessage()
    {
        if ($this->request->getPost('data') && session()->get('id')) {

            $jsonDecode = json_decode($this->request->getPost('data'), true);
            $uniq = session()->get('id');
            $arr = array(
                'time' => $jsonDecode['datetime'],
                'sender_message_id' => $uniq,
                'receiver_message_id' => $jsonDecode['uniq'],
                'message' => $jsonDecode['message'],
            );

            $queryChat = $this->builderMessage;

            $queryChat->sentMessage($arr);
        }
    }
}