<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <section class="content">
        <div class="customer-index">
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
                                <th>Code</th>
                                <th>Tên</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
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
                                <td><?= $row['customer_code']?></td>
                                <td><?= $row['full_name']?></td>
                                <td><?= $row['phone']?></td>
                                <td><?= $row['email']?></td>
                                <td><?= $row['gender']?></td>
                                <td><?= $row['dob']?></td>
                                <td><?= $row['address']?></td>
                                <td>
                                    <div class="row">
                                        <a class="btn" href="javascript:void(0)" onclick="updateCustomer(<?= $row['customer_id']?>)"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn" href="<?php echo base_url();?>/customer/delete/<?php echo $row['customer_id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa fa-trash"></i> Xóa</a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++;}?>
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
                    <form id="w0" action="<?php echo base_url();?>/customer/create" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Họ và tên</label>
                                    <input type="text" class="form-control" name="full_name" maxlength="255" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tên</label>
                                    <input type="text" class="form-control" name="name" maxlength="255" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Họ</label>
                                    <input type="text" class="form-control" name="family_name" maxlength="255" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" maxlength="255" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phone 2</label>
                                    <input type="text" class="form-control" name="phone2" maxlength="255">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" name="email" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email 2</label>
                                    <input type="text" class="form-control" name="email2" maxlength="255">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày sinh</label>
                                    <input type="date" id="birthday" class="form-control" name="dob" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Giới tính</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tỉnh thành</label>
                                    <select class="form-control" name="city_id" required>
                                        <option value="">Tỉnh thành</option>
                                        <?php foreach ($city as $row_city) : ?>
                                        <option value="<?= $row_city['city_id']?>"><?= $row_city['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" maxlength="255">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalUpdate" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="show_kq"></form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function updateCustomer(id){
        $.ajax({
            url: '/customer/load',
            type: 'POST',
            data: {
                id: id,
                _csrf : '<?= csrf_field() ?>'
            },
            success: function(data) {
                // console.log(data.name);
                $('#show_kq').html(data);

                $('#myModalUpdate').modal('show');
            },
            error: function() {
                alert('Lỗi');
            }
        });
    }

    </script>

<?= $this->endSection() ?>

