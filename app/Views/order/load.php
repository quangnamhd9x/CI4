<?php

use App\Models\ProductModel;
$productModel = new ProductModel();
$product = $productModel->findByAll();

$gender = array(
    array(
        'name' => 'Nam'
    ),
    array(
        'name' => 'Nữ'
    ),
);
?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#order_detail" data-toggle="tab">Chi tiết đơn hàng</a></li>
    <li><a href="#order_history" data-toggle="tab">Lịch sử ghi chú</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="order_detail" style="border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-bottom: 1px solid #ccc;">
        <div class="row">
            <div style="margin: 30px;">
                <div style="display: flex;">
                    <p>ID đơn hàng: <b>4</b></p>
                    <p style="margin: 0 10px;">Trạng thái: <b>Chưa liên hệ được</b></p>
                    <p>Ngày: 2020-10-10 12:00</p>
                </div>
                <hr style="margin-top: 0;">
                <table class="table table-bordered table-striped" id="add_product_load">
                    <tr>
                        <th style="width: 20px;">STT</th>
                        <th>Tên sản phẩm</th>
                        <th style="width: 120px;">Giá bán</th>
                        <th style="width: 130px;">Giá mua</th>
                        <th style="width: 100px;">Số lượng</th>
                        <th style="width: 140px;">Thành tiền</th>
                        <th style="width: 100px;"><a class="btn btn-primary show_product" title="Thêm sản phẩm"><i class="fa fa-plus-square-o" style="cursor: pointer; color: #fff;"></i></a></th>
                    </tr>
                    <?php foreach ($order_detail as $key=>$row_order_detail) : ?>
                    <tr class="product">
                        <td><?= $key?></td>
                        <td>
                            <select class="form-control" name="gender">
                                <?php foreach ($product as $row_product) : ?>
                                <option <?php if($row_order_detail['product_id'] == $row_product['product_id']){echo 'selected';}?> value="<?= $row_product['product_id']?>"><?= $row_product['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                        <td><?= number_format($row_order_detail['price'])?></td>
                        <td><input type="text" class="order_price form-control" name="price" onkeyup="this.value=addcommas(this.value);" maxlength="255" value="<?= number_format($row_order_detail['price'])?>"></td>
                        <td><input type="number" class="order_quantity form-control" value="<?= $row_order_detail['quantity']?>" name="quantity" min="1"></td>
                        <td class="total_price"><?= number_format($row_order_detail['price']*$row_order_detail['quantity'])?></td>
                        <td>
                            <div class="row" style="display: flex; justify-content: space-between;">
                                <a href="javascript:void(0)" style="padding: 8px 10px;background: forestgreen;border-radius: 5px;"><i style="color: #fff; font-size: 15px;" class="fa fa-file-o" aria-hidden="true"></i></a>
                                <a class="deleteOrderDetail" href="javascript:void(0)" style="padding: 8px 10px;background: red;border-radius: 5px;" data-id="<?= $row_order_detail['order_detail_id']?>"><i style="color: #fff; font-size: 15px;" class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <div class="row" id="show_add_product" style="display: none;">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label">Tên khóa học hoặc sản phẩm</label>
                            <select class="form-control" id="select_product_load">
                                <option value="">Chọn khóa học hoặc sản phẩm</option>
                                <?php foreach ($product as $row_product) : ?>
                                <option data-price="<?= $row_product['price']?>" value="<?= $row_product['product_id']?>"><?= $row_product['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>             
                    <div class="col-md-4">
                        <div class="form-group">
                            <button onclick="addProductLoad()" style="margin-top: 22px;" type="button" class="btn btn-success"><i class="fa fa-plus-square-o" style="cursor: pointer; color: #fff;"></i> Thêm sản phẩm hoặc khóa học</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label">Ghi chú cuộc gọi</label>
                            <textarea class="form-control" name="w3review" rows="4"></textarea>
                        </div>                    
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Trạng thái đơn hàng</label>
                            <select class="form-control" name="payment_method_id" required>
                                <option value="">Trạng thái đơn hàng</option>
                            </select>
                        </div>
                        <button style="margin-top: 20px;" type="button" class="btn btn-info">Lưu ghi chú</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Mã khách hàng</label>
                            <input type="text" disabled class="form-control" value="<?= $customer['customer_code']?>" name="customer_code" maxlength="255">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Họ tên</label>
                            <input type="text" class="form-control" id="customer_full_name" value="<?= $customer['full_name']?>" name="full_name" maxlength="255">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="customer_phone" value="<?= $customer['phone']?>" name="phone" maxlength="255">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" id="customer_email" value="<?= $customer['email']?>" name="email" maxlength="255">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Ngày sinh</label>
                            <input type="date" id="birthday" class="form-control" name="dob" value="<?= $customer['dob']?>" maxlength="255">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Giới tính</label>
                            <select class="form-control" id="customer_gender" name="gender">
                                <option value="">Giới tính</option>
                                <?php foreach ($gender as $row_gender) : ?>
                                <option <?php if($row_gender['name'] == $customer['gender']){echo 'selected';}?> value="<?= $row_gender['name']?>"><?= $row_gender['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <input type="text" value="<?= $customer['address']?>" id="customer_address" class="form-control" name="address" maxlength="255">
                        </div>
                    </div>
                    <input type="hidden" id="customer_id" name="customer_id" value="<?= $customer['customer_id']?>">
                </div>
                <ul style="display: flex; justify-content: center; margin-top: 15px;">
                    <button type="button" onclick="updateCustomer()" class="btn btn-success">Lưu thông tin khách hàng</button>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="order_history">
        Lịch sử ghi chú
    </div>
</div>
<script>

$('.order_quantity').change(function(){
    var quantity = $(this).val();
    var price = $(this).closest('.product').find('.order_price').val();
    var price = price.replaceAll(',','');
    $(this).closest('.product').find('.total_price').html(formatNumber(price*quantity));
});

function changeQuantity(){
    $('.order_quantity').change(function(){
        var quantity = $(this).val();
        var price = $(this).closest('.product').find('.order_price').val();
        var price = price.replaceAll(',','');
        $(this).closest('.product').find('.total_price').html(formatNumber(price*quantity));
    });
}

$('.order_price').change(function(){
    var price = $(this).val();
    var price = price.replaceAll(',','');
    var quantity = $(this).closest('.product').find('.order_quantity').val();
    $(this).closest('.product').find('.total_price').html(formatNumber(price*quantity));
});

function changePrice(){
    $('.order_price').change(function(){
        var price = $(this).val();
        var price = price.replaceAll(',','');
        var quantity = $(this).closest('.product').find('.order_quantity').val();
        $(this).closest('.product').find('.total_price').html(formatNumber(price*quantity));
    });
}

$(".show_product").click(function(){
    $("#show_add_product").toggle();
});
function addProductLoad(){
    var value = $('#select_product_load :selected').val();
    var text = $('#select_product_load :selected').html();
    var price = $('#select_product_load :selected').attr('data-price');
    var price_format = formatNumber(price);
    if(value > 0){
        $('#add_product_load').append('\
            <tr class="product">\n\
                <td></td>\n\
                <td>\n\
                    <select class="form-control" name="gender">\n\
                        <option value="'+ value +'">'+ text +'</option>\n\
                    </select>\n\
                </td>\n\
                <td style="text-align: center;">'+ price_format +'</td>\n\
                <td><input type="text" class="order_price form-control" name="price" onkeyup="this.value=addcommas(this.value);" maxlength="255" value="'+ price_format +'"></td>\n\
                <td><input type="number" class="order_quantity form-control" value="1" name="quantity" min="1"></td>\n\
                <td class="total_price" style="text-align: center;">'+ price_format +'</td>\n\
                <td style="text-align: center;">\n\
                    <i class="fa fa-times-circle remove_load" style="font-size: 22px; margin-top: 10px; cursor: pointer; color: red;"></i>\n\
                </td>\n\
            </tr>\n\
        ');
    }else{
        alert('Chọn khóa học hoặc sản phẩm cần thêm');
    }
    removeloadvalue();
    changePrice();
    changeQuantity();
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

$('.deleteOrderDetail').click(function() {
    var deleted = confirm("Bạn có chắc chăn muốn xóa");
    if (deleted == true) {
        $(this).closest('.product').remove();
    }
});

function removeloadvalue(){
    $('.remove_load').click(function() {
        $(this).closest('.product').remove();
    });
}

function updateCustomer(){
    var customer_id = $('#customer_id').val();
    var full_name = $('#customer_full_name').val();
    var phone = $('#customer_phone').val();
    var email = $('#customer_email').val();
    var dob = $('#birthday').val();
    var gender = $('#customer_gender :selected').val();
    var address = $('#customer_address').val();

    $.ajax({
        url: '/customer/update',
        type: 'POST',
        data: {
            customer_id: customer_id,
            full_name: full_name,
            phone: phone,
            email: email,
            dob: dob,
            gender: gender,
            address: address,
            _csrf : '<?= csrf_field() ?>'
        },
        success: function(data) {
            alert('ok');
        },
        error: function() {
            alert('Lỗi');
        }
    });
}
</script>