<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <section class="content">
        <div class="product-index">
            <div class="box box-primary">
                <div class="box-heading" style="display: flex; justify-content: space-between;">
                    <div>
                        <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="javascript:void(0)" style="margin: 15px">Thêm mới</a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background: #f5f5f5">
                                <th style="width: 30px;">STT</th>
                                <th>Tên</th>
                                <th>Phone</th>
                                <th>Hotline</th>
                                <th style="width: 110px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($value as $row) { 
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['name']?></td>
                                <td><?= $row['phone']?></td>
                                <td><?= $row['hotline']?></td>
                                <td>
                                    <div class="row">
                                        <a class="btn" href="javascript:void(0)" onclick="updateAgency(<?= $row['agency_id']?>)"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn" href="<?php echo base_url();?>/agency/delete/<?php echo $row['agency_id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa fa-trash"></i> Xóa</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm mới</h4>
                </div>
                <div class="modal-body">
                    <form id="w0" action="<?php echo base_url();?>/agency/create" method="post">
                        <div class="form-group field-banner-name">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" maxlength="255" required="">
                        </div>
                        <div class="form-group field-banner-link">
                            <label class="control-label">Phone</label>
                            <input type="text" class="form-control" name="phone" maxlength="255">
                        </div>
                        <div class="form-group field-banner-link">
                            <label class="control-label">Hotline</label>
                            <input type="text" class="form-control" name="hotline" maxlength="255">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>                       
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
 
    <div id="myModalUpdate" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="agency_title">Sửa</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input id="agency_id" type="hidden" class="form-control" name="id" maxlength="255" required="">
                        <div class="form-group field-banner-name">
                            <label class="control-label">Name</label>
                            <input type="text" id="agency_name" class="form-control" name="name" maxlength="255" required="">
                        </div>
                        <div class="form-group field-banner-link">
                            <label class="control-label">Phone</label>
                            <input type="text" id="agency_phone" class="form-control" name="phone" maxlength="255">
                        </div>
                        <div class="form-group field-banner-link">
                            <label class="control-label">Hotline</label>
                            <input type="text" id="agency_hotline" class="form-control" name="hotline" maxlength="255">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>                       
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function updateAgency(id){
        $.ajax({
            url: '/agency/load',
            type: 'POST',
            dataType : 'json',
            data: {
                id: id,
                _csrf : '<?= csrf_field() ?>'
            },
            success: function(data) {
                // console.log(data.name);
                $('#agency_title').html('Sửa: ' + data.name);
                $('#agency_id').val(id);
                $('#agency_name').val(data.name);
                $('#agency_hotline').val(data.hotline);
                $('#agency_phone').val(data.phone);
                $('#myModalUpdate').modal('show');
            },
            error: function() {
                alert('Lỗi');
            }
        });
    }

    </script>

<?= $this->endSection() ?>

