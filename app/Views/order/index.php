<?php
use App\Models\CustomerModel;

$customerModel = new CustomerModel();
?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  line-height: 35px;
}

tr:nth-child(even) {
  background-color: #efefef;
  line-height: 35px;
}
</style>
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
                                <th>Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Nguồn</th>
                                <th>Ngày</th>
                                <th style="width: 110px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($value as $row) {
                                    $customer = $customerModel->findById($row['customer_id']);
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $customer['full_name']?></td>
                                <td><?= $customer['phone']?></td>
                                <td><?= $customer['email']?></td>
                                <td></td>
                                <td><?= $customer['date_entered']?></td>
                                <td>
                                    <div class="row">
                                        <a class="btn" href="javascript:void(0)" onclick="updateOrder(<?= $row['order_id']?>, <?= $row['customer_id']?>)"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn" href="<?php echo base_url();?>/order/delete/<?php echo $row['order_id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i class="fa fa-trash"></i> Xóa</a>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm mới</h4>
                </div>
                <div class="modal-body">
                    <form id="w0" action="<?php echo base_url();?>/course/create" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Thông tin khách hàng</label>
                                    <input type="text" class="form-control" name="customer_id" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nguồn</label>
                                    <input type="text" class="form-control" name="utm_id" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Khu vực muốn học</label>
                                    <select class="form-control" name="city_id" required>
                                        <?php foreach ($city as $row_city) : ?>
                                        <option value="">Khu vực</option>
                                        <option value="<?= $row_city['city_id']?>"><?= $row_city['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Trạng thái</label>
                                    <input type="text" class="form-control" name="order_status_id" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Hình thức thanh toán</label>
                                    <select class="form-control" name="payment_method_id" required>
                                        <?php foreach ($payment_method as $row_payment_method) : ?>
                                        <option value="">Hình thức thanh toán</option>
                                        <option value="<?= $row_payment_method['payment_method_id']?>"><?= $row_payment_method['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">Lưu ý</label>
                                    <input type="text" class="form-control" name="note" maxlength="255">
                                </div>

                            </div>
                            <div class="col-md-8">
                                <ul style="border: 1px solid #ccc; margin: 0;padding: 10px;">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="control-label">Tên khóa học hoặc sản phẩm</label>
                                                <select class="form-control" id="select_product">
                                                    <option value="">Chọn khóa học hoặc sản phẩm</option>
                                                    <?php foreach ($product as $row_product) : ?>
                                                    <option value="<?= $row_product['product_id']?>"><?= $row_product['name']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label"></label>
                                                <i onclick="addProduct()" class="fa fa-plus-square-o" style="font-size: 30px; margin-top: 25px; cursor: pointer; color: #3ec313;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="add_product"></div>
                                </ul>
                            </div>
                        </div>
                        <br>
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
        <div class="modal-dialog modal-lg" style="width: 1100px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết đơn hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="show_kq">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

    function addProduct(){
        var value = $('#select_product :selected').val();
        var text = $('#select_product :selected').html();
        if(value > 0){
            $('#add_product').append('\
                <div class="row">\n\
                    <div class="col-md-6">\n\
                        <div class="form-group">\n\
                            <label class="control-label">Tên khóa học hoặc sản phẩm</label>\n\
                            <select class="form-control" name="product_id[]" id="select_product">\n\
                                <option value="'+ value +'">'+ text +'</option>\n\
                            </select>\n\
                        </div>\n\
                    </div>\n\
                    <div class="col-md-2">\n\
                        <div class="form-group">\n\
                            <label class="control-label">Số lượng</label>\n\
                            <input type="number" class="form-control" value="1" name="quantity[]" min="1" required>\n\
                        </div>\n\
                    </div>\n\
                    <div class="col-md-3">\n\
                        <div class="form-group">\n\
                            <label class="control-label">Giá</label>\n\
                            <input type="text" class="form-control" name="price[]" onkeyup="this.value=addcommas(this.value);" maxlength="255" required>\n\
                        </div>\n\
                    </div>\n\
                    <div class="col-md-1">\n\
                        <div class="form-group">\n\
                            <label class="control-label"></label>\n\
                            <i class="fa fa-times-circle remove" style="font-size: 22px; margin-top: 10px; cursor: pointer; color: red;"></i>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
            ');
        }else{
            alert('Chọn khóa học hoặc sản phẩm cần thêm');
        }
        removevalue();
    }

    function removevalue(){
        $('.remove').click(function() {
            $(this).closest('.row').remove();
        });
    }

    function updateOrder(order_id, customer_id){
        $.ajax({
            url: '/order/load',
            type: 'POST',
            data: {
                order_id: order_id,
                customer_id: customer_id,
                _csrf : '<?= csrf_field() ?>'
            },
            success: function(data) {
                
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
