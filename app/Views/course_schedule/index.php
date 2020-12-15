<?php
use App\Models\CourseModel;
$course_name = new CourseModel();
?>
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
                                <th>Tên khóa học</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Địa chỉ tổ chức</th>
                                <th>Số lượng</th>
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
                                <td><?= $course_name->findByName($row['course_id'])?></td>
                                <td><?= $row['date_start']?></td>
                                <td><?= $row['date_end']?></td>
                                <td><?= $row['venue']?></td>
                                <td><?= $row['total_slot']?></td>
                                <td>
                                    <div class="row">
                                        <a class="btn" href="javascript:void(0)" onclick="updateCourseSchedule(<?= $row['course_schedule_id']?>)"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn" href="<?php echo base_url();?>/course-schedule/delete/<?php echo $row['course_schedule_id ']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa fa-trash"></i> Xóa</a>
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
                    <form id="w0" action="<?php echo base_url();?>/course-schedule/create" method="post">

                        <div class="form-group">
                            <label class="control-label">Khóa học</label>
                            <select class="form-control" name="course_id" required>
                                <option value="">Chọn khóa học</option>
                                <?php foreach ($course as $row_course) : ?>
                                <option value="<?= $row_course['course_id']?>"><?= $row_course['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input type="datetime-local" class="form-control" name="date_start" maxlength="255" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input type="datetime-local" class="form-control" name="date_end" maxlength="255" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa điểm tổ chức</label>
                                    <input type="text" class="form-control" name="venue" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Số lượng</label>
                                    <input type="number" class="form-control" value="10" name="total_slot" min="1" required>
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
                    <form action="<?php echo base_url();?>/course-schedule/update" method="post" id="show_kq"></form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function updateCourseSchedule(id){
        $.ajax({
            url: '/course-schedule/load',
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

