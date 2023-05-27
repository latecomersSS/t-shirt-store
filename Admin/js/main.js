$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if (confirm("Xóa sẽ không thể khôi phục - Bạn có muốn xóa không ?")){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi ! Vui lòng thử lại.');
                }
            }
        })
    }
}



/* Upload file */
$('#upload').change(function (){
   const form = new FormData();
   form.append('file', $(this)[0].files[0]);

   $.ajax({
       processData: false,
       contentType: false,
       type: 'POST',
       dataType: 'JSON',
       data : form,
       url : 'upload',
       success: function(results){
           if(results.error == false){
               $('#image_show').html('<a href="'+ results.url +'" target="_blank"><img src="'+ results.url +'" width="100px"></a>');
               $('#file').val(results.url);
           } else {
               alert('Upload fle lỗi !');
           }
       }
   });
});


function addProductForm(){
	var name = document.forms["addProduct"]["name"].value;
    var quantity = document.forms["addProduct"]["quantity"].value;
    var price = document.forms["addProduct"]["price"].value;
    var saleprice = document.forms["addProduct"]["saleprice"].value;
    var desc = document.forms["addProduct"]["description"].value;
    //var kiemTraDT = /^0[3|5|7|9]\d{8,9}$/g;
    //var checkemail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
	if (name == "") {
        alert("Tên sản phẩm không được để trống");
        return false;
    }
    if (quantity == "") {
        alert("Số lượng không được để trống");
        return false;
    }
    if (quantity < 1) {
        alert("Số lượng phải lớn hơn không");
        return false;
    }
    if (desc == "") {
        alert("Mô tả sản phẩm không được để trống");
        return false;
    }
    if (price == "") {
        alert("Giá nhập sản phẩm không được để trống");
        return false;
    }
    if (saleprice == "") {
        alert("Giá bán sản phẩm không được để trống");
        return false;
    }
    if (price > saleprice) {
        alert("Giá nhập phải nhỏ hơn giá bán");
        return false;
    }
}


function addCategoryForm(){
	var name = document.forms["addCategory"]["name"].value;
    var desc = document.forms["addCategory"]["description"].value;
	if (name == "") {
        alert("Tên danh mục không được để trống");
        return false;
    }
    if (desc == "") {
        alert("Mô tả danh mục không được để trống");
        return false;
    }
}

function addStockForm(){
	var name = document.forms["addStock"]["name"].value;
    var desc = document.forms["addStock"]["address"].value;
	if (name == "") {
        alert("Tên kho hàng không được để trống");
        return false;
    }
    if (desc == "") {
        alert("Địa chỉ không được để trống");
        return false;
    }
}

function addSupplierForm(){
	var name = document.forms["addSupplier"]["name"].value;
    var address = document.forms["addSupplier"]["address"].value;
    var phone= document.forms["addSupplier"]["phone"].value;
    var email= document.forms["addSupplier"]["email"].value;
    var checkphone = /^0[3|5|7|9]\d{8,9}$/g;
    var checkemail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
	if (name == "") {
        alert("Tên nhà cung cấp không được để trống");
        return false;
    }
    if (address == "") {
        alert("Địa chỉ không được để trống");
        return false;
    }
  
    if (phone == "") {
        alert("Số điện thoại không được để trống");
        return false;
    }
    if (email == "") {
        alert("Email không được để trống");
        return false;
    }
    
    if (checkphone.test(phone)){
        if (checkemail.test(email)) return true;
        else{
            alert('Email không hợp lệ!');
            return false;
        }
    }
    else{
        alert('Số điện thoại phải gồm 10 hoặc 11 chữ số và bắt đầu bằng số 0!');
        return false;
    }
}

function addUserForm(){
	var name = document.forms["addUser"]["name"].value;
    var password = document.forms["addUser"]["password"].value;
    var phone= document.forms["addUser"]["phone"].value;
    var email= document.forms["addUser"]["email"].value;
    var checkphone = /^0[3|5|7|9]\d{8,9}$/g;
    var checkemail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
	if (name == "") {
        alert("Tên tài khoản không được để trống");
        return false;
    }
    if (password == "") {
        alert("Mật khẩu không được để trống");
        return false;
    }
  
    if (phone == "") {
        alert("Số điện thoại không được để trống");
        return false;
    }
    if (email == "") {
        alert("Email không được để trống");
        return false;
    }
    
    if (checkphone.test(phone)){
        if (checkemail.test(email)) return true;
        else{
            alert('Email không hợp lệ!');
            return false;
        }
    }
    else{
        alert('Số điện thoại phải gồm 10 hoặc 11 chữ số và bắt đầu bằng số 0!');
        return false;
    }
}
