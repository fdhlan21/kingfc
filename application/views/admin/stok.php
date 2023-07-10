<!-- Begin Page Content -->
<?php
include "koneksi.php";
?>



<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin'); ?>" class="btn bg-secondary"><i class="fas fa-fw  fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>
            <a href="<?= base_url('tambahstok'); ?>" class="btn bg-warning" style=""><i class="fas fa-fw  fa-plus-square" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Tambah Stok Barang</span></a>
        </div>

        <div class="card-body">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <label>

                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_filter">
                            <label style="padding-left: 100px;">
                                <input type="search" class="form-control form-control-sm" placeholder="Cari Nama Barang" aria-controls="DataTables_Table_0" style="border-radius: 10px; padding-left: 10px; width: 300px;">
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <form method="post" action="" enctype="multipart/form-data">
                            <table class="table table-bordered table-striped table-hover tabza dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>

                                    <tr class="bg bg-warning" style="color:white" role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 21.3281px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending">Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama Barang: activate to sort column ascending">Nama Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Jumlah Stok: activate to sort column ascending">Jumlah Stok</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    include "koneksi.php";
                                    $no = 1;
                                    $ambildata = mysqli_query($koneksi, "SELECT * FROM stokbarang ORDER BY id ASC");
                                    while ($tampil = mysqli_fetch_array($ambildata)) {
                                        echo "
                                    
<tr role='row' class='odd'>
<td>$no</td>
<td>$tampil[id]</td>
<td>$tampil[nama_gambar]</td>
<td>$tampil[nama_barang]</td>
<td>$tampil[jumlah_stok]</td>
<td>
<a  class='btn btn-primary' href='?id=$tampil[id]'><i class='fas fa-fw fa-trash'></i></a>
<a style='padding-top:10px;' class='btn btn-success' href='ubahstok?id=$tampil[id]'><i class='fas fa-edit'></i></a>
<a class='btn btn-warning' href='ubahpassword?id=$tampil[id]'><i class='fas fa-unlock' style='color: #ffffff;'></i></a>
</td>
                                    
                                    
                                    ";

                                        $no++;
                                    }


                                    ?>


                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7" style="padding-left: 400px;">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous " id="DataTables_Table_0_previous">
                                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link" style="color: black;">Previous</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link" style="color: black;">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


</div>