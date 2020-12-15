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
                        <th>Workflow Stages ID</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Qualified Lead</th>
                        <th>Sort Order ID</th>
                        <th>Date Entered</th>
                        <th style="width: 110px;">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($value as $row) : ?>
                        <tr>
                            <td><?= $row['order_status_id'] ?></td>
                            <td><?= $row['workflow_stage_id'] ?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['alias']?></td>
                            <td>...</td>
                            <td><?= $row['type']?></td>
                            <td><?= $row['qualified_lead']?></td>
                            <td><?= $row['sort_order_id']?></td>
                            <td><?= $row['date_entered']?></td>
                            <td>
                                <div class="row">
                                    <a class="btn" href="javascript:void(0)" onclick="updateOrderStatus(<?= $row['order_status_id']?>)"><i class="fa fa-edit"></i> Sửa</a>
                                    <a class="btn" href="<?php echo base_url();?>/orderstatus/delete/<?php echo $row['order_status_id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa fa-trash"></i> Xóa</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
                <form id="w0" action="<?php echo base_url();?>/orderstatus/create" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Workflow Stage ID</label>
                                <input type="number" class="form-control" name="workflow_stage_id" maxlength="255" required>
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
                                <label class="control-label">Alias</label>
                                <input type="text" class="form-control" name="alias" maxlength="255" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <input type="text" class="form-control" name="description" maxlength="255" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <select class="form-control" name="type" required>
                                    <option value="OK">OK</option>
                                    <option value="Wait">Wait</option>
                                    <option value="Success">Success</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Sort Order ID</label>
                                <input type="number" class="form-control" name="sort_order_id" maxlength="255" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Qualified Lead</label>
                                <input type="number" class="form-control" name="qualified_lead" maxlength="255" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date entered</label>
                                <input type="date" class="form-control" name="date_entered" maxlength="255">
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
    function updateOrderStatus(id){
        $.ajax({
            url: '/orderstatus/load',
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

