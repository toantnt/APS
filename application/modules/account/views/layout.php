<!doctype html>
<html class="no-js" lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title><?php echo ($subtitle == NULL ? 'Account' : $subtitle . ' | Website Managenment') ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png.html">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/public/admin/resources/css/vendor.css" />
        <link rel="stylesheet" href="/public/admin/resources/css/app-blue.css" />
        <!-- Theme initialization -->
        <script src="/public/admin/resources/js/jquery.min.js"></script>
        <script src="/public/admin/resources/js/jquery.validate.min.js"></script>
    </head>
	<body>
		<div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> Admin Management 
                        </h1>
                    </header>
                    <?php $this->load->view($subview, TRUE) ?>
                </div>
                <div class="text-center">
                    <a href="<?php echo site_url() ?>" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Back to frontend </a>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        
        <script>
            var site = location.protocol + '//' + location.host;
            $(document).ready(function() {
                $("#login-form").validate({
                    rules: {
                        username: { 
                            required: true,
                            remote: {
                                url: site + '/account/auth/checkUsername',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    username: function () {
                                        return $('#login-form :input[name="username"]').val();
                                    }
                                }
                            }
                        },
                        password: { 
                            required: true,
                            remote: {
                                url: site + '/account/auth/checkPassword',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    password: function () {
                                        return $('#login-form :input[name="password"]').val();
                                    }
                                }
                            }
                        }
                    },
                    messages: { 
                        username: { 
                            required: "Bạn phải nhập tài khoản",
                            remote: "Tên đăng nhập không hợp lệ"
                        },
                        password: { 
                            required: "Bạn phải nhập mật khẩu",
                            remote: "Mật khẩu không hợp lệ"
                        },
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url: site + '/account/auth/login',
                            type: $(form).attr('method'),
                            data: $(form).serialize(),
                            success: function(res) {
                                if(res === 'TRUE') {
                                    window.location = site + '/admin/dashboard';
                                } else {
                                    $(".alertFailed").removeClass("invisible");
                                    return false;
                                }
                            }
                        });
                    }
                })
            });
            $("#reset-form").validate({
                rules: {
                    email1: { 
                        required: true,
                        email: true,
                        remote: {
                            url: site + '/account/auth/checkEmail',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                email: function () {
                                    return $('#reset-form :input[name="email1"]').val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    email1: {
                        required: "Bạn phải nhập email",
                        email: "Định dạng email không đúng",
                        remote: "Email không tồn tại"
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: site + '/account/auth/send_pass',
                        type: $(form).attr('method'),
                        data: $(form).serialize(),
                        success: function(res) {
                            if(res === 'TRUE') {
                                $(".alertReset").removeClass("invisible");
                            } else { 
                                return false;
                            }
                        }
                    });
                }
            });
        </script>
	</body>
</html>
