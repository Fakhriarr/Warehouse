<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="styleAdd.css">
        <title>warehouse</title>
    </head>
    <body>
      <div class="background" height="100%">
            <video autoplay loop muted >
                <source src="assets/luffy.mp4">
            </video>
        </div>
        <nav class="navbar navbar-dark bg-dark opacity-75 mb-5">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">
                <i class="fa-solid fa-warehouse"></i>
                Warehouse.
              </a>
            </div>
        </nav>
          <div class="container">
            <form method="POST" action="process.php" enctype="multipart/form-data">
              <div class="mb-3 row">
                  <label for="merek" class="col-sm-2 col-form-label">Merek</label>
                  <div class="col-sm-10">
                      <select required id = "merek" name = "merek" class="form-select">
                          <option selected>Pilih merek</option>
                          <option value="Advan">Advan</option>
                          <option value="Apple">Apple</option>
                          <option value="Huawei">Huawei</option>
                          <option value="Infinix">Infinix</option>
                          <option value="LG">LG</option>
                          <option value="Oppo">Oppo</option>
                          <option value="Poco">Poco</option>
                          <option value="Redmi">Redmi</option>
                          <option value="Realme">Realme</option>
                          <option value="Samsung">Samsung</option>
                          <option value="Tecno">Tecno</option>
                          <option value="Vivo">Vivo</option>
                          <option value="Xiaomi">Xiaomi</option>
                        </select>
                  </div>
              </div>
                <div class="mb-3 row">
                  <label for="seri" class="col-sm-2 col-form-label">Seri</label>
                  <div class="col-sm-10">
                    <input required type="text" name= "nomor_seri" class="form-control" id="seri" placeholder="ex: CPHXXXX, SMXXXX">
                  </div>
              </div>
                <div class="mb-3 row">
                  <label for="memori" class="col-sm-2 col-form-label">Memori</label>
                  <div class="col-sm-10">
                      <select required id="memori" name = "memori" class="form-select">
                          <option selected>Pilih memori</option>
                          <option value="3/64">3/64</option>
                          <option value="3/128">3/128</option>
                          <option value="3/256">3/256</option>
                          <option value="4/64">4/64</option>
                          <option value="4/128">4/128</option>
                          <option value="4/256">4/256</option>
                          <option value="4/512">4/512</option>
                          <option value="6/128">6/128</option>
                          <option value="6/256">6/256</option>
                          <option value="6/512">6/512</option>
                          <option value="8/128">8/128</option>
                          <option value="8/256">8/256</option>
                          <option value="8/512">8/512</option>
                        </select>
                  </div>
              </div>
                <div class="mb-3 row">
                  <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                  <div class="col-sm-10">
                    <input required type="text" name = "harga" class="form-control" id="harga" placeholder="ex: Rp. 2.XXX.XXX">
                  </div>
              </div>
                <div class="mb-3 row">
                  <label for="stok" class="col-sm-2 col-form-label">Jumlah Stok</label>
                  <div class="col-sm-10">
                    <input required type="number" name = "stok" class="form-control" id="stok" placeholder="ex: 5">
                  </div>
              </div>
                  <div class="mb-3 row mt-5">
                      <div class="col">
                      <?php
                        include 'connect.php';

                        $id_number = '';
                        $merek = '';
                        $memori = '';
                        $nomor_seri = '';
                        $harga = '';
                        $stok = '';

                        if(isset($_GET['edit'])){
                        $id_number = $_GET['edit'];

                        $query = "SELECT * FROM tb_stock WHERE id_number = '$id_number';";
                        $sql = mysqli_query($connect, $query);

                        $result = mysqli_fetch_assoc($sql);

                        $merek = $result['brand'];
                        $memori = $result['memory'];
                        $nomor_seri = $result ['serial_number'];
                        $harga = $result['price'];
                        $stok = $result['stock'];
                        ?>
                          <button type="submit" name="action" value="edit" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-check"></i>
                              Save  
                          </button>
                        <?php
                          } else {
                        ?>
                          <button type="submit" name="action" value="add" class="btn btn-info btn-sm">
                              <i class="fa-regular fa-square-plus"></i>
                              Add
                          </button>
                        <?php
                          }
                        ?>
                          <a href="index.php" type="button" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-xmark"></i>
                              Cancel  
                          </a>
                      </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </body>
</html>