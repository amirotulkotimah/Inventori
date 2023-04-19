<!doctype html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo_nix.png">
        <title>Inventaris</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <style>body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #B0BEC5;
            background-repeat: no-repeat
        }

        .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px
        }

        .card2 {
            margin: 0px 40px
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-top: 20px;
            margin-left: 35px
        }

        .image {
            width: 360px;
            height: 280px
        }

        .border-line {
            border-right: 1px solid #EEEEEE
        }

        .facebook {
            background-color: #3b5998;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .twitter {
            background-color: #1DA1F2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .linkedin {
            background-color: #2867B2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px
        }

        .or {
            width: 10%;
            font-weight: bold
        }

        .text-sm {
            font-size: 14px !important
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300
        }

        :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        a {
            color: inherit;
            cursor: pointer
        }

        .btn-purple {
            background-color: #C12267;
            width: 150px;
            color: #fff;
            border-radius: 2px
        }

/*.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}*/

.bg-purple {
    color: #fff;
    background-color: #C12267;
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
</style>
<!-- Styles -->
</head>
<form class="form-horizontal" action="<?php echo base_url('Login_c/cek_log');?>" method="POST">
<body oncontextmenu='return false' class='snippet-body'>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row"></div>
                        <br>
                        <br>
                        <div class="row px-3 justify-content-center mt-4 mb-3 border-line"> <img src="<?php echo base_url();?>assets/images/logo_nix.png" class="image" > </div>
                    </div>
                </div>

                <div class="col-lg-6 py-4">
                    <div class="card2 card border-0 px-4 py-4">
                        <div class="row mb-0 px-3">
                            <h6 class="mb-0 mr-0 mt-10"><img src="" class=""></h6>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div> <small class="or text-center">Sign in</small>
                            <div class="line"></div>
                        </div>
                       
                        <form action="" method="POST">
                            <?php $error = $this->session->flashdata('message_name');
                            ?>
                            <p align="center" style="color:red;"><?php echo $error; ?></p>
                            <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Username</h6>
                            </label> <input class="mb-4" type="text" name="txt_user" placeholder="Enter username" required> 
                        </div>

                        <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="txt_pass" placeholder="Enter password" required> 
                    </div>

                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <!-- <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a> -->
                    </div>
                    <div> <button type="submit" name="btn_log" class="btn btn-purple btn-rounded m-b-30 m-t-30">Login</button> </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            
        </div>
        
        <div class="bg-purple py-3">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2"><!-- Copyright &copy; 2019. All rights reserved. --></small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
</form>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src=''></script>
<script type='text/Javascript'></script>
</body>
</html>