<div class="container mt-5">
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $data['mkm']['nama']; ?></h5>
        <?php foreach( $data['mkm'] as $mkm) :?>
        <p class="card-text"><?= $data['mkm']['nama_matkul']; ?></p>
        <?php endforeach;?>
        <a href="<?= BASEURL; ?>/matkulmhs" class="card-link">Kembali</a>
      </div>
    </div>

</div>