<?php 
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('data_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['buku'] = $this->data_model->ambil_data()->result();
		$this->load->view('main', $data);
	}

    public function view_tambah() {
        $this->load->view('tambah_data');
    }

    public function tambah() {
        $judul = $this->input->post('judul');
        $no_buku = $this->input->post('no_buku');
        $kategori = $this->input->post('kategori');
        $peminjam = $this->input->post('peminjam');
        $date = $this->input->post('date');

        $data = array(
            'judul' => $judul,
            'no_buku' => $no_buku,
            'kategori' => $kategori,
            'peminjam' => $peminjam,
            'date' => $date
        );

        $this->data_model->input_data($data, 'buku');
        redirect('home');
    }

    public function delete($id) {
        $where = array('no' => $id);
        $this->data_model->hapus_data($where, 'buku');
        redirect('home');
    }

    public function view_edit($id)
    {
        $where = array('no' => $id);
        $data['buku'] = $this->data_model->edit_data($where, 'buku')->result();
        $this->load->view('edit_data', $data);
    }

    public function edit() {
        $no = $this->input->post('no');
        $judul = $this->input->post('judul');
        $no_buku = $this->input->post('no_buku');
        $kategori = $this->input->post('kategori');
        $peminjam = $this->input->post('peminjam');
        $date = $this->input->post('date');

        $data = array(
            'judul' => $judul,
            'no_buku' => $no_buku,
            'kategori' => $kategori,
            'peminjam' => $peminjam,
            'date' => $date
        );

        $where = array('no' => $no);

        $this->data_model->update_data($where, $data, 'buku');
        redirect('home');
    }
}
?>