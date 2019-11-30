<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Products_model');
        $this->load->model('Transaksi_model');
        $data['countCart'] = $this->Transaksi_model->CountCart();
        Auth_User();
    }

    public function index()
    {
        
        redirect('Transaksi/CartShop','refresh');
        
    }

    public function Cart()
    {
        
        $data['title'] = 'Cart';
        $qty = $this->input->post('quantity');

        // var_dump($this->input->post());

        $barang = $this->input->post('kd_brg');
        $konsumen = $this->session->userdata('id');   

        $keranjang = $this->db->get_where('keranjang', ['kd_brg' => $barang, 'kd_konsumen' => $konsumen] )->result_array();
        if (count($keranjang) > 0) {
            echo "<script>alert('Product sudah ada di keranjang');</script>";
            redirect('Products','refresh');
            die;
        }
        // $count = count($this->db->get_where('keranjang', ['kd_brg' => $barang])->row_array());

        
        
        
        $query = $this->db->query("SELECT MAX(kd_keranjang) as kodeker from keranjang");
        $hasil = $query->row();
        // return $hasil->kodeker;

        $dariDB = $hasil->kodeker;
        
        $nourut = substr($dariDB, 5, 2);
        $kodeKerSekarang = $nourut + 1;
        $kode = array('kd_keranjang' => $kodeKerSekarang);
        $convert = implode("", $kode);
        $kodeBarngg = sprintf("%02s", $convert);
        $kode = 'Cart-'.$kodeBarngg;
        

        
        $data = [
            'kd_keranjang' => $kode,
            'kd_brg' => $barang,
            'kd_konsumen' => $konsumen,
            'jumlah' => $qty
        ];
        
        $this->db->insert('keranjang', $data);

        
        redirect('Transaksi/CartShop','refresh');
    }

    public function DeleteCart($id)
    {
        $this->db->where('kd_keranjang', $id);
        $this->db->delete('keranjang');

        
        redirect('Transaksi/CartShop','refresh');
        
    }

    public function CartShop()
    {
        $data['title'] = 'Cart';
        $this->load->model('Category_model');
        $this->load->model('Kota_model');
        $this->load->model('Provinsi_model');
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->Category_model->GetCategory();


        
        $data['cart'] = $this->Transaksi_model->GetCartShop();
        $data['countCart'] = $this->Transaksi_model->CountCart();
        // $data['kota'] = $this->Kota_model->GetKotaByIdProvinsi($this->input->post('prov_id'));
        $data['provinsi'] = $this->Provinsi_model->GetProvinsi();

        $karakter = '0abcdefghijklmnopqrstuvwxyz';
            $karaktekLength = strlen($karakter);
            $result = 'TokoLapak-';
            $length = 5;
            for ($i=1; $i <=$length; $i++) { 
                $result .= $karakter[rand(0, $karaktekLength-1)];
            }

        $resi = $result.time();
    
            $data['acak'] = $resi;

        $this->form_validation->set_rules('penerima', 'penerima', 'required');
        $this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('kode', 'kode', 'required|numeric');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kota', 'kota', 'required');



        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/v_cart', $data);
            $this->load->view('templates/footer', $data);
        } else{

            $this->db->trans_start();
            
            $data['keranjang'] = $this->input->post('item');
            $data['harga'] = $this->input->post('harga');
            $data['alamat'] = $this->input->post('alamat');
            $data['penerima'] = $this->input->post('penerima');
            $data['telp'] = $this->input->post('telp');
            $data['provinsi'] = $this->input->post('provinsi');
            $data['kota'] = $this->input->post('kota');
            $data['kode'] = $this->input->post('kode');
            $data['ongkir'] = $this->input->post('ongkir');
            $data['pembayaran'] = 'Cash On Delivery';
            $data['resi'] = $this->input->post('resi');

            $konsumen = $this->session->userdata('id');

            $value = [
                'tgl_trans' => time(),
                'kd_konsumen' => $konsumen,
                'biaya_kirim' => $this->input->post('ongkir'),
                'resi' => $this->input->post('resi'),
                'status' => 'Di kirim',
                'sub_total' => $this->input->post('harga')+$this->input->post('ongkir'),
                'alamat' => $this->input->post('alamat')

            ];

            $this->db->insert('transaksi', $value);

            // get ID transaksi
            $transaksi_id = $this->db->insert_id();
            $detail = array();
            $keranjang = $this->input->post('item');

            foreach ($keranjang as $key) {
                $query = $this->Transaksi_model->GetCartById($key);
                    $kd_brg = $query[0]['kd_brg'];
                    $jumlah = $query[0]['jumlah'];
                    $detail[] = array(
                        'kd_trans' => $transaksi_id,
                        'kd_brg' => $kd_brg,
                        'jumlah' => $jumlah
                    );

                    $this->db->where('kd_keranjang', $key);
                    $this->db->delete('keranjang');
            }

            
            $this->db->insert_batch('detail_transaksi', $detail);
            
            $this->db->trans_complete();
            
            
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/v_checkout', $data);
            $this->load->view('templates/footer', $data);
            
            
        }
        

    }

    public function UpdateCart()
    {
        $id = $this->input->post('kd_keranjang');
        $quantity = $this->input->post('quantity');

        $data = [
            "jumlah" => $quantity
        ];

        $this->db->where('kd_keranjang', $this->input->post('kd_keranjang'));
        $this->db->update('keranjang', $data);

        
        redirect('Transaksi/CartShop','refresh');
        
    }

    public function GetCartById()
    {
        echo json_encode($this->Transaksi_model->GetCartById($this->input->post('kd_keranjang')));
    }

    public function getKota()
    {
        $this->load->model('Kota_model');
        $id = $this->input->post('id'); // Ambil data ID  yang dikirim via ajax post 
        $kota = $this->Kota_model->GetKotaByIdProvinsi($id);; 
        // Buat variabel untuk menampung tag-tag option nya 19 // Set defaultnya dengan tag option Pilih 20 
        $lists = "<option value=''>Pilih Kota</option>"; 
        foreach($kota as $data)
        { 
            $lists .= "<option value='".$data->kd_kota."'>".$data->nama_kota." </option>"; // Tambahkan tag option ke variabel $lists 
        } 
        $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_transaksi 27  28 
        echo json_encode($callback); // konversi varibael $callback menjadi JSON 29 } 30 
    }

    public function getOngkir()
    {
        $this->load->model('Ongkir_model');
        $id = $this->input->post('id'); // Ambil data ID  yang dikirim via ajax post 
        $ongkir = $this->Ongkir_model->getOngkirByIdKota($id);; 
        // Buat variabel untuk menampung tag-tag option nya 19 // Set defaultnya dengan tag option Pilih 20 
        $lists = "<option value=''>Pilih Pengiriman</option>"; 
        foreach($ongkir as $data)
        { 
            $lists .= "<option value='".$data->biaya_kirim."'>".$data->nama_jasa." - " . $data->nama_jp." = ". number_format($data->biaya_kirim)  ." </option>"; // Tambahkan tag option ke variabel $lists 
        } 
        $callback = array('list_ongkir'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_transaksi 27  28 
        echo json_encode($callback); // konversi varibael $callback menjadi JSON 29 } 30 
    }

    
    




}