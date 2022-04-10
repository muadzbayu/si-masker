<?php
class home extends CI_CONTROLLER{
    function __construct (){
        parent::__construct ();
        $this->load->model('dataProduk');
        $this->load->model('loginModel');
        $this->load->model('cartModel');
    }
    function index(){
        $data['produk']=$this->dataProduk->ambildata()->result();
        $this->load->view('homeView.php',$data);
    }

    function tambah(){
        $nama = $this->input->post('nama_produk');
        $harga = $this->input->post('harga_produk');
        $jumlah = $this->input->post('jumlah_produk');
        $data = array('nama_produk' => $nama,
                       'harga_produk' => $harga,
                       'jumlah_produk' => $jumlah);
        $this->dataProduk->tambahdata($data);
		redirect('home');
    }
    function cart(){
        $data['keranjangku'] = $this->cartModel->get_all($this->session->userdata('user'));
        $this->load->view('homeEditTemp.php',$data);
    }
    function addCart(){
        if($this->session->userdata('statusku') == 'Customer'){
            $id = $this->uri->segment(3);
            $idku = array('id_produk'=> $id);
            $q = $this->dataProduk->editdata($idku);
            $qq = $q->row();
            $user = $this->session->userdata('user');
            $this->loginModel->insert_data($user,$qq->id_produk,$qq->nama_produk);
        }
        redirect('home');
    }
    function deleteCart(){
        $id = $this->uri->segment(3);
        $idku = array('id_produk'=>$id);
        $this->cartModel->delete($idku);
        redirect('home/cart');
    }
    function editBarang(){
        $id = $this->uri->segment(3);
        $baru = array('id_produk'=> $id);
        $data['produk'] = $this->dataProduk->editdata($baru);
        $this->load->view('homeEdit.php',$data);
    }

    function updateBarang(){
        $id = $this->input->post('id_produk');
        $nama = $this->input->post('nama_produk');
        $harga = $this->input->post('harga_produk');
        $jumlah = $this->input->post('jumlah_produk');
        $data = array('nama_produk' => $nama,
                       'harga_produk' => $harga,
                       'jumlah_produk' => $jumlah);
        $this->dataProduk->updatedata($data,$id);
        redirect('home');
    }

    function upload(){
        $target_path = "assets/img/";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
		echo "$target_path";
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
		{
			redirect('home');
		}
		else{
			echo "Error uploading file. Please try again!";
			redirect('home');
		}
    }

    function deleteBarang(){
		$hapus = $this->uri->segment(3);
        $this->dataProduk->deletedata($hapus);
		redirect('home');
	}
    function delete(){
		$hapus = $this->uri->segment(3);
		unlink("assets/img/".$hapus);
		redirect('home');
	}

    function keluar(){
        $this->session->sess_destroy();
        redirect('home');
    }
}
?>