<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Mata Kuliah pada Mahasiswa
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/matkulmhs/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar Mahasiswa</h3>
          <ul class="list-group">
            <?php foreach( $data['mkm'] as $mkm ) : ?>
              <li class="list-group-item">
                  <?= $mkm['nama']; ?>
                  <a href="<?= BASEURL; ?>/matkulmhs/hapus/<?= $mkm['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/matkulmhs/ubah/<?= $mkm['id']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mkm['id']; ?>">ubah</a>
                  <a href="<?= BASEURL; ?>/matkulmhs/detail/<?= $mkm['id']; ?>" class="badge badge-primary float-right">detail</a>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mata kuliah pada Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/matkulmhs/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="id">Nama</label>
            <select class="form-control" id="id" name="id">
              <?php
                $a=mysqli_query($db, "SELECT * FROM matkulmhs");
                  while($opsi=mysqli_fetch_array($a)){
              ?>
              <option value="<?=$opsi['id']?>"><?=$opsi['nama']?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="id_matkul">Mata Kuliah</label>
            <select class="form-control" id="id_matkul" name="id_matkul">
              <?php
                $a=mysqli_query($db, "SELECT * FROM matkulmhs");
                  while($opsi=mysqli_fetch_array($a)){
              ?>
              <option value="<?=$opsi['id_matkul']?>"><?=$opsi['nama_matkul']?></option>
              <?php } ?>
            </select>
          </div>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>




