<?php
?>
<div class="row">
    <input type="hidden" name="customer_id" value="<?= $value['customer_id']?>">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Tên</label>
            <input type="text" class="form-control" name="name" maxlength="255" value="<?= $value['name']?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Alias</label>
            <input type="text" class="form-control" name="alias" maxlength="255" value="<?= $value['alias']?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Stage Number</label>
            <input type="text" class="form-control" name="stage_number" maxlength="255" value="<?= $value['stage_number']?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Date entered</label>
            <input type="date" value="<?= $value['date_entered']?>" class="form-control" name="date_entered" maxlength="255">
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-7">
            <div class="form-group">
                <label class="control-label">Trạng thái giai đoạn</label>
                <select class="form-control" name="stages_are_allowed" required>
                    <option value="<?= $value['stages_are_allowed']?>"><?= $value['stages_are_allowed']?></option>
                    <option value="OK">OK</option>
                    <option value="Wait">Wait</option>
                    <option value="Success">Success</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>