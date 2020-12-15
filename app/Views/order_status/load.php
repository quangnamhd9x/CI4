<?php
?>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Workflow Stage ID</label>
            <input type="number" value="<?= $value['workflow_stage_id']?>" class="form-control" name="workflow_stage_id" maxlength="255" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Tên</label>
            <input type="text" value="<?= $value['name']?>" class="form-control" name="name" maxlength="255" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Alias</label>
            <input type="text" value="<?= $value['alias']?>" class="form-control" name="alias" maxlength="255" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Description</label>
            <input type="text" value="<?= $value['description']?>" class="form-control" name="description" maxlength="255" required>
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
            <input type="number" value="<?= $value['sort_order_id']?>" class="form-control" name="sort_order_id" maxlength="255" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Qualified Lead</label>
            <input type="number" value="<?= $value['qualified_lead']?>" class="form-control" name="qualified_lead" maxlength="255" required>
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
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
</div>