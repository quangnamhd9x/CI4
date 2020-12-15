
<?= $this->extend('login') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel">
                <div class="panel-heading" style="padding:0px !important;">
                    <div class="panel-title" style="text-align: center;">
                        <img src="<?php echo base_url();?>/public/img/logo-320.png" class="img-title">
                        <b class="text-title">ASK ADMIN</b>
                    </div>
                </div>
                <div class="panel-body">
                    <?php if (isset($message)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $message; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" id="login-form">
                        <?= csrf_field() ?>
                        <fieldset>
                            <div class="form-group">
                                <span class="input-group-addon">
                                <i class="fa fa-user" style="margin-top: 8px;"></i>
                                </span>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" required="required" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="input-group-addon"><i class="fa fa-lock" style="margin-top: 8px;"></i></span>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" value="" required="required" placeholder="Password">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-block" name="login">Đăng nhập</button>                
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>