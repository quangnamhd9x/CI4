<?php
$gender = array(
    array(
        'name' => 'Nam'
    ),
    array(
        'name' => 'Nữ'
    ),
);
?>
<div class="row">
    <input type="hidden" name="customer_id" value="<?= $value['customer_id']?>">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Họ và tên</label>
            <input type="text" class="form-control" name="full_name" maxlength="255" value="<?= $value['full_name']?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Tên</label>
            <input type="text" class="form-control" name="name" maxlength="255" value="<?= $value['name']?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Họ</label>
            <input type="text" class="form-control" name="family_name" maxlength="255" value="<?= $value['family_name']?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Phone</label>
            <input type="text" class="form-control" name="phone" maxlength="255" value="<?= $value['phone']?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Phone 2</label>
            <input type="text" class="form-control" name="phone2" value="<?= $value['phone2']?>" maxlength="255">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="text" class="form-control" name="email" value="<?= $value['email']?>" maxlength="255">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Email 2</label>
            <input type="text" class="form-control" name="email2" value="<?= $value['email2']?>" maxlength="255">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Ngày sinh</label>
            <input type="date" id="birthday" value="<?= $value['dob']?>" class="form-control" name="dob" maxlength="255">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Giới tính</label>
            <select class="form-control" name="gender">
                <option value="">Giới tính</option>
                <?php foreach ($gender as $row_gender) : ?>
                <option <?php if($row_gender['name'] == $value['gender']){echo 'selected';}?> value="<?= $row_gender['name']?>"><?= $row_gender['name']?></option>
                <?php endforeach;?>
            </select>
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
                        
<div class="form-group">
    <label class="control-label">Địa chỉ</label>
    <input type="text" class="form-control" name="address" value="<?= $value['address']?>" maxlength="255">
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>                       
</div>