<h1 class="text-center">List Product</h1>
<?php if (isset($error)) {
  echo "error";
}?>

<table class="table table-striped table-responsive-sm">
<a href="<?= base_url() ?>products/addProducts">Tambah Product</a>
  <thead>
    <tr>
      <th scope="col">Nama barang</th>
      <th scope="col">Gambar</th>
      <!-- <th scope="col">bahan</th> -->
      <!-- <th scope="col">warna</th> -->
      <th scope="col">harga</th>
      <th scope="col">Aksi</th>
      <!-- <th scope="col">keyword</th>
      <th scope="col">kategori</th>
      <th scope="col">Diskon</th>
      <th scope="col">ukuran</th>
      <th scope="col">berat</th>
      <th scope="col">stok</th> -->
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $p): ?>
    <tr>
      <td><?= $p['nama_brg']; ?></td>
      <td><img src="<?= base_url(); ?>assets/users/img/product/<?= $p['gambar']; ?>" style="width : 90px; height:90px;" alt=""></td>
      <!-- <td><?= $p['warna']; ?></td> -->
      <td>Rp. <?= number_format($p['harga']); ?></td>
      <td>
        <a href="<?= base_url() ?>Products/DeleteProduct/<?= $p['kd_brg']; ?>/<?= $p['gambar']; ?>/" onclick="return confirm('yakin ?');">Delete</a>
        <a href="<?= base_url() ?>Products/UpdateProduct/<?= $p['kd_brg']; ?>">Update</a>
        <a href="<?= base_url() ?>Products/detailProduct/<?= $p['kd_brg']; ?>">Detail</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
