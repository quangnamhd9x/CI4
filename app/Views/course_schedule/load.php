<input type="hidden" name="course_schedule_id" value="<?= $value['course_schedule_id']?>">
<div class="form-group">
    <label class="control-label">Khóa học</label>
    <select class="form-control" name="course_id" required>
        <option value="">Chọn khóa học</option>
        <?php foreach ($course as $row_course) : ?>
            <option <?php if($value['course_id'] == $row_course['course_id']){echo 'selected';}?> value="<?= $row_course['course_id']?>"><?= $row_course['name']?></option>
        <?php endforeach;?>
    </select>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Ngày bắt đầu</label>
            <input type="datetime-local" class="form-control" name="date_start" value="<?php echo date("Y-m-d\TH:i:s", strtotime($value['date_start']))?>" maxlength="255" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Ngày kết thúc</label>
            <input type="datetime-local" class="form-control" name="date_end" value="<?php echo date("Y-m-d\TH:i:s", strtotime($value['date_end']))?>" maxlength="255" required>
        </div>
    </div>
</div>        
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Địa điểm tổ chức</label>
            <input type="text" class="form-control" name="venue" value="<?= $value['venue']?>" maxlength="255">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Số lượng</label>
            <input type="number" class="form-control" value="<?= $value['total_slot']?>" name="total_slot" min="1" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Tỉnh thành</label>
            <select class="form-control" name="city_id" required>
                <option value="">Tỉnh thành</option>
                <?php foreach ($city as $row_city) : ?>
                <option <?php if($value['city_id'] == $row_city['city_id']){echo 'selected';}?> value="<?= $row_city['city_id']?>"><?= $row_city['name']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>                       
</div>