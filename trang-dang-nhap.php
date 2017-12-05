<?php include('head.php'); ?>

<body class="login-page">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
	 <div class="navbar-header">    
                <h1 class="navbar-brand" href="presentation.html">Quản lý doanh nghiệp</h1>
             </div>
        </div>
    </nav>


	<div class="page-header header-filter" style="background-image: url('assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						<form class="form" method="post" action="" id="form_login">
							<div class="header header-primary text-center">
								<h4 class="card-title">Đăng nhập</h4>
								<div class="social-line">
									<a href="login-page.html#pablo" class="btn btn-just-icon btn-simple">
										<i class="fa fa-facebook-square"></i>
									</a>
									<a href="login-page.html#pablo" class="btn btn-just-icon btn-simple">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="login-page.html#pablo" class="btn btn-just-icon btn-simple">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
							</div>
							<p class="description text-center">Nhập thông tin tài khoản</p>
							<div class="card-content">

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">face</i>
									</span>
									<input id="username" name="username" type="text" class="form-control" placeholder="Tài khoản...">
								</div>

								

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input name="password" id="password" type="password" placeholder="Mật khẩu...." class="form-control" />
								</div>

								<!-- If you want to add a checkbox to this form, uncomment this code

								<div class="checkbox">
									<label>
										<input type="checkbox" name="optionsCheckboxes" checked>
										Subscribe to newsletter
									</label>
								</div> -->
							</div>
							<div class="footer text-center">
								<button id="btn_login" type="submit"  class="btn btn-primary btn-simple btn-wd btn-lg">Đăng nhập</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php include('foot.php'); ?>

<script type="text/javascript">
$(document).ready(function()
{  
    //khai báo nút submit form
    var submit   = $("button[type='submit']");
     
    //khi thực hiện kích vào nút Login
    submit.click(function()
    {
        //khai báo các biến
        var username = $("input[name='username']").val(); //lấy giá trị input tài khoản
        var password = $("input[name='password']").val(); //lấy giá trị input mật khẩu
         
        //kiem tra xem da nhap tai khoan chua
        if(username == ''){
            swal(
                                                         'Lỗi...',
                                                         'Vui lòng nhập tài khoản!',
                                                         'error'
                                                    );
            return false;
        }
         
        //kiem tra xem da nhap mat khau chua
        if(password == ''){
             swal(
                                                         'Lỗi...',
                                                         'Vui lòng nhập mật khẩu!',
                                                         'error'
                                                    );
         
            return false;
        }
         
        //lay tat ca du lieu trong form login
        var data = $('form#form_login').serialize();
        //su dung ham $.ajax()
        $.ajax({
        type : 'POST', //kiểu post
        url  : './lib/check_login.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {                       
                    if(data == 'false')
                    {
                                                        swal({
                                  title: 'Đăng nhập thất bại',
                                  text: 'Trở về trang đăng nhập trong 2s.',
                                  timer: 2000,
                                  onOpen: () => {
                                    swal.showLoading()
                                  }
                                }).then((result) => {
                                  if (result.dismiss === 'timer') {
                                    console.log('Đã trở về trang đăng nhập')
                                  }
                                });
                    }else{
                 

                                    swal({
                                      title: 'Đăng nhập thành công',
                                      text: "Nhấn OK để chuyển tới trang quản trị",
                                      type: 'success',
                                    }).then(function (result) {
                                      if (result.value) {
                                        window.location = "./trang-quan-tri.php";
                                      }
                                    })
                    }
               }
        });
        return false;
    });
});
</script>