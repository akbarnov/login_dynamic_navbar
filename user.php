    <?php require_once 'header.php'; ?>
        
        
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Master User
            <button class="btn btn-primary btn-sm shadow float-right" type="button" data-target="#show-mastercost" data-toggle="modal" data-action="add"><i class="fa fa-plus"></i>&nbsp;Add New</button>
        </h3>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0 nowrap" id="dataTablex" style="width:100%">
                        <thead>
                            <tr style="color: rgb(33,33,33);">
                                <th nowrap>No</th>
                                <th nowrap>Nama</th>
                                <th nowrap>Alamat</th>
                                <th nowrap>No Telp</th>
                                <th style="min-width: 100px;text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CV. BAN ANTI SELIP</td>
                                <td>Jl. Maju Mundur NO 25 Kabupaten Provinsi</td>
                                <td>0271-009878</td>
                                <td style="text-align: center;" nowrap>
                                    <button class="btn btn-primary btn-sm" type="button" data-target="#show-mastercost" data-toggle="modal" data-id="1" data-action="show"><i class="far fa-eye"></i>&nbsp;View</button>
                                    &nbsp;
                                    <button class="btn btn-primary btn-sm" type="button" data-target="#show-mastercost" data-toggle="modal" data-id="1" data-action="edit"><i class="far fa-edit"></i>
                                        &nbsp;Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="show-mastercost">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title" style="font-size: 18px;font-weight: bold;color: rgb(45,45,45);">Detail</h4><button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <form id="showMastercost" method="post">
                <div class="modal-body">
                   
                    <div class="row">
                        <div class="col">
                            <div class="form-group"><label>Nama</label><input autocomplete="off" id="nama" class="form-control" name="nama" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group"><label>Alamat</label><input autocomplete="off" id="alamat" class="form-control" name="alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group"><label>No Telp</label><input autocomplete="off" id="notelp" class="form-control" name="notelp" required>
                            </div>
                        </div>
                    </div>
                    
                </div>
            <div class="modal-footer">
                <!-- area button -->

            </div>
            </form>
            <input autocomplete="off" id="harga_bbm" class="form-control" name="harga_bbm" value="" hidden>
            <input autocomplete="off" id="ratio_bbm" class="form-control" name="ratio_bbm" value="" hidden>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTablex').DataTable( {
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            bPaginate: true,
            bLengthChange: false,
            bFilter: true,
            bInfo: false,
            bAutoWidth: false
        } );

        //menampilkan data container di show modal
        $('#show-mastercost').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var action = $(e.relatedTarget).data('action');

            $('.modal-footer').html('');
            if (action == 'edit') {
                //edit data
                $('#id').attr("disabled", false);
                $('#services').attr("disabled", false);
                $('#truck_type').attr("disabled", false);
                $('#areafrom').attr("disabled", false);
                $('#areato').attr("disabled", false);
                $('#areaback').attr("disabled", false);
                $('#routeplan').attr("disabled", false);
                $('#customer').attr("disabled", false);
                $('#jarak_tempuh_pp').attr("disabled", false);
                $('#bbm_liter').attr("disabled", false);
                $('#bbm_rupiah').attr("disabled", false);
                $('#toll').attr("disabled", false);
                $('#bm').attr("disabled", false);
                $('#mel').attr("disabled", false);
                $('#insentif').attr("disabled", false);
                $('#uang_jalan').attr("disabled", false);
                $('#keterangan').attr("disabled", false);

                $('.modal-footer').append(
                    '<button id="btnclose" class="btn btn-light" type="button" data-dismiss="modal">Close</button>'
                    +'<button id="btnsubmit" class="btn btn-primary" type="submit" data-action="edit">Save</button>'
                );
            }else if (action == 'show'){
                //show data
                $('#id').attr("disabled", true);
                $('#services').attr("disabled", true);
                $('#truck_type').attr("disabled", true);
                $('#areafrom').attr("disabled", true);
                $('#areato').attr("disabled", true);
                $('#areaback').attr("disabled", true);
                $('#routeplan').attr("disabled", true);
                $('#customer').attr("disabled", true);
                $('#jarak_tempuh_pp').attr("disabled", true);
                $('#bbm_liter').attr("disabled", true);
                $('#bbm_rupiah').attr("disabled", true);
                $('#toll').attr("disabled", true);
                $('#bm').attr("disabled", true);
                $('#mel').attr("disabled", true);
                $('#insentif').attr("disabled", true);
                $('#uang_jalan').attr("disabled", true);
                $('#keterangan').attr("disabled", true);
            }else{
                //add new data
                $('.modal-footer').html('');

                $('#id').attr("disabled", false);
                $('#services').attr("disabled", false);
                $('#truck_type').attr("disabled", false);
                $('#areafrom').attr("disabled", false);
                $('#areato').attr("disabled", false);
                $('#areaback').attr("disabled", false);
                $('#routeplan').attr("disabled", false);
                $('#customer').attr("disabled", false);
                $('#jarak_tempuh_pp').attr("disabled", false);
                $('#bbm_liter').attr("disabled", false);
                $('#bbm_rupiah').attr("disabled", false);
                $('#toll').attr("disabled", false);
                $('#bm').attr("disabled", false);
                $('#mel').attr("disabled", false);
                $('#insentif').attr("disabled", false);
                $('#uang_jalan').attr("disabled", false);
                $('#keterangan').attr("disabled", false);
                $('.modal-footer').append(
                    '<button id="btnclose" class="btn btn-light" type="button" data-dismiss="modal">Close</button>'
                    +'<button id="btnsubmit" class="btn btn-primary" type="submit" data-action="add">Save</button>'
                );
            }
        });


    });
    
</script>
<?php require_once 'footer.php'; ?>
            