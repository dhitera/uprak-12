<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Halaman Edit Data</title>
    <style>
        body {
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            }

        .form-signin {
            width: 100%;
            max-width: 500px;
            padding: 15px;
            margin: auto;
            }
    </style>
</head>
<body>
    <main class="form-signin">
    <a href="<?php echo base_url() . 'home'; ?>" class="btn-lg btn-link position-absolute top-0 start-0 fs-1"><i class="bi bi-x-lg"></i></a>
    <?php foreach ($buku as $data) { ?>
    <form action="<?php echo base_url() . 'home/edit'; ?>" method="POST">
        <h1 class="h2 mb-3 fw-normal text-center">Edit Data Buku</h1>

        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="peminjam" name="peminjam" value="<?= $data->peminjam; ?>">
            <label for="peminjam">Nama Peminjam</label>
        </div>
        <div class="form-floating mb-2">
            <input type="hidden" name="no" value="<?= $data->no ?>">
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $data->judul; ?>">
            <label for="judul">Judul Buku</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="no_buku" name="no_buku" value="<?= $data->no_buku; ?>">
            <label for="no_buku">No. buku</label>
        </div>
        <div class="mb-2">
            <select class="form-select" name="kategori">
                <option selected >Kategori</option>
                <option value="Ensiklopedia" 
                <?php if($data->kategori == "Ensiklopedia") echo 'selected="selected"'; ?>>Ensiklopedia</option>
                <option value="Fiksi" 
                <?php if($data->kategori == "Fiksi") echo 'selected="selected"'; ?>>Fiksi</option>
                <option value="Novel" 
                <?php if($data->kategori == "Novel") echo 'selected="selected"'; ?>>Novel</option>
                <option value="Komik" 
                <?php if($data->kategori == "Komik") echo 'selected="selected"'; ?>>Komik</option>
                <option value="Majalah" 
                <?php if($data->kategori == "Majalah") echo 'selected="selected"'; ?>>Majalah</option>
                <option value="Puisi" 
                <?php if($data->kategori == "Puisi") echo 'selected="selected"'; ?>>Puisi</option>
            </select>
        </div>
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
        <button class="d-block w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
    </form>
    <?php } ?>
    </main>
</body>
</html>