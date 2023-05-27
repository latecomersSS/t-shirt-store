function removeRow(id, url){
    if (confirm("Bạn có muốn xóa không")){
        var url = "index.php?act="+url+"&id="+id;
        $.ajax({
            datatype: 'JSON',
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




function addDetailForm(){
	var quantity = document.forms["addDetail"]["quantity"].value;	
    if (quantity < 1){
        alert("Số lượng phải lớn hơn 0.");
        return false;
    }
}

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
    
    //if (kiemTraDT.test(sdt)){
    //    if (checkemail.test(email)) return true;
    //    else{
    //        alert('Email không hợp lệ!');
    //        return false;
    //    }
    //}
    //else{
    //    alert('Số điện thoại không hợp lệ!');
    //    return false;
    //}
}

function checkoutForm(){
	var fname = document.forms["checkout"]["fname"].value;
    var lname = document.forms["checkout"]["lname"].value;
    var country = document.forms["checkout"]["country"].value;
    var town = document.forms["checkout"]["town"].value;
    var state= document.forms["checkout"]["state"].value;
    var address= document.forms["checkout"]["address"].value;
    var state= document.forms["checkout"]["state"].value;
    var phone= document.forms["checkout"]["phone"].value;
    var email= document.forms["checkout"]["email"].value;
    var checkphone = /^0[3|5|7|9]\d{8,9}$/g;
    var checkemail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
	if (fname == "") {
        alert("First Name không được để trống");
        return false;
    }
    if (lname == "") {
        alert("Last Name không được để trống");
        return false;
    }
    if (country == "") {
        alert("Country không được để trống");
        return false;
    }
    if (town == "") {
        alert("Town không được để trống");
        return false;
    }
    if (state == "") {
        alert("State không được để trống");
        return false;
    }
    if (address == "") {
        alert("Address không được để trống");
        return false;
    }
    if (phone == "") {
        alert("Phone không được để trống");
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


function registerForm(){
	var name = document.forms["register"]["name"].value;
    var password = document.forms["register"]["password"].value;  
    var phone= document.forms["register"]["phone"].value;
    var email= document.forms["register"]["email"].value;
    var checkphone = /^0[3|5|7|9]\d{8,9}$/g;
    var checkemail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
	if (name == "") {
        alert("Tên người dùng không được để trống");
        return false;
    }
    if (password == "") {
        alert("Mật khẩu không được để trống");
        return false;
    }
    if (phone == "") {
        alert("Phone không được để trống");
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



