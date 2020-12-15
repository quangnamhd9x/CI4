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
                                <th>Tên</th>
                                <th>Price</th>
                                <th>Giá Sale</th>
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
                                <td><?= $row['price']?></td>
                                <td><?= $row['saleoff_price']?></td>
                                <td>
                                    <div class="row">
                                        <a class="btn" href="javascript:void(0)" onclick="updateProduct(<?= $row['product_id']?>)"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn" href="<?php echo base_url();?>/product/delete/<?php echo $row['product_id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa fa-trash"></i> Xóa</a>
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
                    <form id="w0" action="<?php echo base_url();?>/product/create" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label class="control-label">Tên</label>
                            <input type="text" class="form-control" name="name" maxlength="255" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Bí danh</label>
                            <input type="text" class="form-control" name="alias" maxlength="255" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giá</label>
                                    <input type="text" class="form-control" name="price" onkeyup="this.value=addcommas(this.value);" maxlength="255" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giá cũ</label>
                                    <input type="text" class="form-control" name="saleoff_price" onkeyup="this.value=addcommas(this.value);" maxlength="255" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sản phẩm Khóa học</label>
                            <select class="form-control" name="course_id">
                                <?php foreach ($course as $row_course) : ?>
                                <option>Không phải khóa học</option>
                                <option value="<?= $row_course['course_id']?>"><?= $row_course['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group" style="display: flex;">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a id="btn_product_option" onclick="addProductOption()" style="display: none; margin-left: 15px;" class="btn btn-info">Add</a>                       
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
                    <h4 class="modal-title" id="product_title">Sửa</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="show_kq">
                        <?= csrf_field() ?>
                        <input id="product_id" type="hidden" class="form-control" name="product_id" maxlength="255" required="">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" id="product_name" class="form-control" name="name" maxlength="255" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bí danh</label>
                            <input type="text" id="product_alias" class="form-control" name="alias" maxlength="255" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giá</label>
                                    <input id="product_price" type="text" class="form-control" name="price" onkeyup="this.value=addcommas(this.value);" maxlength="255" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giá cũ</label>
                                    <input id="product_saleoff_price" type="text" class="form-control" name="saleoff_price" onkeyup="this.value=addcommas(this.value);" maxlength="255" required>
                                </div>
                            </div>
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

    <script type="text/javascript">
    function updateProduct(id){
        $.ajax({
            url: '/product/load',
            type: 'POST',
            dataType : 'json',
            data: {
                id: id,
                _csrf : '<?= csrf_field() ?>'
            },
            success: function(data) {
                $('#product_title').html('Sửa: ' + data.name);
                $('#product_id').val(id);
                $('#product_name').val(data.name);
                $('#product_alias').val(data.alias);
                $('#product_price').val(data.price);
                $('#product_saleoff_price').val(data.saleoff_price);
                $('#myModalUpdate').modal('show');
            },
            error: function() {
                alert('Lỗi');
            }
        });
    }

    </script>
<?= $this->endSection() ?>
