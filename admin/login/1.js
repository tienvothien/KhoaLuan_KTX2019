$(function(){
	 	var cc = $(window).height();
	 	$('.bg').css({'height':cc});
	 	$(window).resize(function() {
	 		var cc = $(window).height();
	 		$('.bg').css({'height':cc});
	 	});
})  
$(document).ready(function () {
	$('#formdangnhap').on('submit', function(event){
          event.preventDefault();
          var tendangnhap = $('#tendangnhap').val();
          var matkhaudangnhap = MD5(MD5(MD5($('#matkhaudangnhap').val())));
          // alert(tendangnhap+'--'+matkhaudangnhap);
          $.ajax({
          	url: './../../dulieu/login.php',
          	type: 'POST',
          	data: {tendangnhap:tendangnhap,
          		matkhaudangnhap:matkhaudangnhap
          	},
          	success:function (kqlogin) {
          		if (kqlogin==2) {
          			alert( "Tên đăng nhập không đúng");
          			document.getElementById("tendangnhap").focus();
          		}else {
          			if (kqlogin==1) {
          				alert("Mật khẩu không đúng");
          				document.getElementById("matkhaudangnhap").focus();
	          		}else {
	          			if (kqlogin==0) {
	          				 window.location="./../";
	          			}else if(kqlogin==9){
	          				window.location='./../../sinhvien/index.php'
	          			}else if (kqlogin==3) {
                                        alert("Tài khoản của bạn không đủ quyền truy cập trang Website này..!");
                              }
	          		}
          		}
         	}
          
          });
          
      });
});