<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Halaman Home</title>
    <style>
        body {
            margin: 2%;
        }
    </style>
</head>
<body>
    <h1 class="d-inline">Daftar Peminjaman Buku |</h1>
    <a href="Home/view_tambah" class="btn btn-success mb-3">Tambah Data</a>
    <?php 
    if($this->session->userdata('username')){
        echo '<a href="Login/logout" class="btn btn-danger mt-1 float-end">Logout</a>';
   }else{
       echo '<a href="Login/index" class="btn btn-success mt-1 float-end">Login</a>';
   }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">No. Buku</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Dipinjam</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($buku as $data) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $data->peminjam; ?></td>
                <td><?= $data->judul; ?></td>
                <td><?= $data->no_buku; ?></td>
                <td><?= $data->kategori; ?></td>
                <td><i><?= $data->date; ?></i></td>
                <td>
                    <a href="<?= 'home/delete/'.$data->no; ?>" class="btn btn-danger">Hapus</a>
                    <a href="<?= 'home/view_edit/'.$data->no; ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>