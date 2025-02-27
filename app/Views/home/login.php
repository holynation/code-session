<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Nairaboom">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard for Nairaboom">
    <!-- Fav Icon  -->
    <link rel="icon" type="image/icon" href="<?php echo base_url('assets/nairaboom_favicon.ico'); ?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Page Title  -->
    <title>Login | Nairaboom</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/public/css/dashlite.css'); ?>">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5 mb-4">
                                    <a href="<?php echo base_url(); ?>" class="logo-link">
                                        <div class="logo-img logo-img-lg mb3">
                                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><style>.cls-1{fill:#1ed760;}</style></defs><path class="cls-1" d="M513.83,478.78V416.89A5.45,5.45,0,0,0,512.2,413l-11-10.85a5.61,5.61,0,0,0-9.58,3.86v61.89a5.44,5.44,0,0,0,1.62,3.87l11,10.85A5.62,5.62,0,0,0,513.83,478.78Z"/><path class="cls-1" d="M696.72,475.29q-2.57-2.49-5.13-4.8c-6.1-5.5-4-15.2,3.74-18.1a30.24,30.24,0,0,0,10.48-6.8c19.68-18.95,5.63-51.87-22-51.87H545.44a10.94,10.94,0,0,0-11.09,11v.1a11,11,0,0,0,11.08,10.87H684.68c11.38,0,11.6,16.91,0,16.91H545.43a11,11,0,0,0-11.08,10.87V467a10.72,10.72,0,0,0,3.21,7.64h0c7,6.9,19,2.06,19-7.64v-1.58A11,11,0,0,1,567.6,454.5h28.53c35.94,0,63.4,16.45,82.83,36.09a11.13,11.13,0,0,0,7.63,3.29l2.1.06C698.77,494.21,703.92,482.23,696.72,475.29Z"/><path class="cls-1" d="M871.21,511a290.05,290.05,0,0,1-25.75,20.33c-19.8,13.49-30.2,16.23-52.54,16.23-22,0-33.89-3.29-53.23-16.45A291.57,291.57,0,0,1,714.18,511c-9.42-7.56-18.94-.44-18.94,7.77v63.77a6.87,6.87,0,0,0,2,4.88l8,7.95c4.45,4.39,12.09,1.31,12.09-4.88v-34.3a7.06,7.06,0,0,1,11.08-5.69c13.9,9.5,28.62,16.48,45.38,19,31.83,4.78,57.79-2.09,83.09-19.12a7.06,7.06,0,0,1,11,5.74v26.42a6.87,6.87,0,0,0,2,4.88l8,7.95c4.45,4.39,12.09,1.31,12.09-4.88V518.8C890.14,510,879.85,503.76,871.21,511Z"/><path class="cls-1" d="M316.82,492.73a11,11,0,0,0,15.23-2.05c20.21-26.54,25.74-33.85,52.8-69.47,6.36-7.74,11.22-8.16,17.43,0l25.82,33.51H382.93a10.73,10.73,0,1,0,0,21.46h61.69L456,490.68a11,11,0,0,0,15.23,2.05,10.66,10.66,0,0,0,2.08-15c-18.54-24.08-37.14-48.69-55.85-73-11.46-14.83-34.92-15.8-46.65-.67Q343,441,314.74,477.7A10.67,10.67,0,0,0,316.82,492.73Z"/><path class="cls-1" d="M726.17,492.73a11,11,0,0,0,15.22-2.05c20.21-26.54,25.75-33.85,52.81-69.47,6.35-7.74,11.22-8.16,17.43,0l25.82,33.51H792.28a10.73,10.73,0,1,0,0,21.46H854l11.38,14.5a11,11,0,0,0,15.23,2.05,10.66,10.66,0,0,0,2.07-15c-18.54-24.08-37.13-48.69-55.85-73-11.46-14.83-34.92-15.8-46.64-.67q-27.85,37-56.07,73.7A10.66,10.66,0,0,0,726.17,492.73Z"/><path class="cls-1" d="M443.25,509.48H347.16c-12.74,0-23.11,6.32-30.57,16-25.26,32.72-3.44,80.69,28.3,81.45H441c25.51,0,41.66-25.76,41.66-48.72C482.65,535.79,466.88,510.05,443.25,509.48Zm-7,76H351.91c-9,0-15.85-3-20.49-9.61-8.64-12.28-8.12-44.92,20.49-44.92h84.32c8.77,0,15.93,3.12,20.49,9.61C465.52,553.05,464.61,585.46,436.23,585.46Z"/><path class="cls-1" d="M633.69,509.48h-96.1c-12.73,0-23.1,6.32-30.56,16-25.27,32.72-3.44,80.69,28.3,81.45h96.1c25.51,0,41.65-25.76,41.65-48.72C673.08,535.79,657.32,510.05,633.69,509.48Zm-7,76H542.35c-9,0-15.85-3-20.49-9.61-8.65-12.28-8.12-44.92,20.49-44.92h84.32c8.77,0,15.92,3.12,20.49,9.61C656,553.05,655.05,585.46,626.67,585.46Z"/><path class="cls-1" d="M298.62,406.11a10.87,10.87,0,0,0-21.73,0v19.13h21.73Z"/><path class="cls-1" d="M265.7,471.26H246.89c-8.66,0-15-3-19.21-8H203.45c6,15.73,18.84,29,35.75,29.44h48.24a11.07,11.07,0,0,0,11.18-11V463.27H276.47A11.16,11.16,0,0,1,265.7,471.26Z"/><path class="cls-1" d="M154.47,416.83h20c8.89,0,15.37,3.19,19.55,8.41h24c-5.89-15.92-18.85-29.45-35.91-29.86h-49.4a11.08,11.08,0,0,0-11.19,11v18.89h22A11.14,11.14,0,0,1,154.47,416.83Z"/><path class="cls-1" d="M271,503.06H189.3a11.08,11.08,0,0,0-11.19,11,10.83,10.83,0,0,0,3.28,7.76A11.27,11.27,0,0,0,189.3,525h82.57c10.92,0,12.13,16.92.23,16.92H154.47a11.08,11.08,0,0,1-11.19-11V463.27H121.54V482a9.8,9.8,0,0,0,.11,1.54v65.53a7.57,7.57,0,0,0-.11,1.36v41.31a10.91,10.91,0,0,0,3.21,7.79,11.16,11.16,0,0,0,7.87,3.18H271c23.91,0,39-25.32,27-45.4a8.18,8.18,0,0,1,0-8.38C309.85,528.94,295.28,503.06,271,503.06Zm.92,77.71H152.66a8.8,8.8,0,0,1-8.94-7.94,8.52,8.52,0,0,1,8.61-9H271.87C283.47,563.86,283.26,580.77,271.87,580.77Z"/><rect class="cls-1" x="121.54" y="440.27" width="21.74" height="7.97"/><path class="cls-1" d="M221.38,440.27H199.6c.05.4.08.8.11,1.21.1,1.46.07,2.9.13,4.37,0,.79.08,1.59.15,2.39h21.76c-.09-.83-.15-1.67-.18-2.53,0-1.21,0-2.42-.08-3.63C221.47,441.48,221.43,440.88,221.38,440.27Z"/><path class="cls-1" d="M114.24,438.24H310.82v.08h1.41a5.24,5.24,0,0,0,5.23-5.23v-.54a5.24,5.24,0,0,0-5.23-5.23H298.62v-.05H276.89v.05H218.77l0-.05h-23.3l0,.05H143.29v-.05H121.54v.05h-5.91a5.79,5.79,0,0,0-5.77,5.77A5.23,5.23,0,0,0,114.24,438.24Z"/><path class="cls-1" d="M310.82,461.32h1.41a5.24,5.24,0,0,0,5.23-5.23v-.54a5.24,5.24,0,0,0-5.23-5.23H298.62v-.05H276.89v.05H222s0,0,0-.05H200.2a.09.09,0,0,1,0,.05H143.28v-.05H121.54v.05h-5.91a5.79,5.79,0,0,0-5.77,5.77,5.23,5.23,0,0,0,4.38,5.15H310.82Z"/><rect class="cls-1" x="276.89" y="440.27" width="21.73" height="7.97"/></svg>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the Nairaboom dashboard using your email and password.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <!-- <form action="#"> -->
                                <?php echo form_open("auth/web?_=".time(), array('class'=> 'form','id'=>'loginForm')); ?>
                                        <!-- this is the notification section -->
                                        <div id="notify"></div>
                                        <!-- end notification -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" name="email" id="default-01" placeholder="Enter your email address ">
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your password">
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block" id="btnLogin">Sign in</button>
                                    </div>
                                    <input type="hidden" name="isajax" value="true">
                                    <input type="hidden" id='base_path' value="<?php echo base_url(); ?>">
                                </form><!-- form -->

                                <!-- this is short test for interswitch -->
                                <!-- <form action="" method="post" id="payment_form">
                                    <input type="hidden" name="ref" id="ref">
                                    <input type="hidden" name="pay_Ref" id="pay_ref">
                                    <input type="hidden" name="payment_amount" id="payment_amount" value="0">
                                    <input type="submit" name="inter_form" id="inter_form" value="Test Interswitch">
                                </form> -->
                                
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="mt-3">
                                    <script>
                                      document.write(new Date().getFullYear());
                                    </script>
                                    Nairaboom. Machine Push NIG.LTD. All Rights Reserved | Powered by
                                    <a href="https://codefixbug.com" target="_blank" class="footer-link fw-bolder">Codefixbug Limited.</a>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->


    <!-- <script src="https://newwebpay.qa.interswitchng.com/inline-checkout.js"></script> -->
    <!-- <script src="https://webpay-ui.k8.isw.la/inline-checkout.js"></script> -->
    <!-- interswtich payment javascript -->
    <!-- <script type="text/javascript">
        let paymentLog = document.getElementById("payment_form");
        // this ID(submitForm) below would be the ID on the submit button to make payment
        let submitForm = document.getElementById("inter_form");
        submitForm.addEventListener("click", submitHandler);
        function submitHandler(event) {
            event.preventDefault();
            var redirectUrl = location.href;
            var paymentRequest = {
              merchant_code: 'MX22741',
              pay_item_id: 'Default_Payable_MX22741',
              txn_ref: "ksndfi8526", // generate a random reference string
              amount: 150000, // in kobo
              currency: 566,
              site_redirect_url: redirectUrl,
              onComplete: paymentCallback,
              mode: 'TEST' // LIVE|TEST
            };
            window.webpayCheckout(paymentRequest);
         }
        function paymentCallback(response) {
            if (response.resp == "00"){
              let payRef = (response.payRef) ? response.payRef : "";
              document.getElementById('ref').value = response.txnref;
              document.getElementById('pay_ref').value = payRef;
              document.getElementById('payment_amount').value = response.amount;
              paymentLog.submit();
            }
        }
    </script> -->

    <!-- JavaScript -->
    <script src="<?php echo base_url('assets/public/js/bundle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/public/js/scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/custom.js'); ?>"></script>
    <script type="text/javascript">
        $(function(){
            // here is the login
            var form = $('#loginForm');
            var note = $("#notify");
            note.text('').hide();

            form.submit(function(event) {
                event.preventDefault();
                $("#btnLogin").html("Authenticating...").addClass('disabled').prop('disabled', true);
                submitAjaxForm($(this));
                // $("#btnLogin").removeClass("disabled").removeAttr('disabled').html("Sign in");
            });
        })

        function ajaxFormSuccess(target,data){
            data = JSON.parse(data);
            $("#notify").text('').show();
            if (data.status) {
                var path = data.message;
                location.assign(path);
            }
            else{
              $("#btnLogin").removeClass("disabled").removeAttr('disabled').html("Sign in");
              $("#notify").text(data.message).addClass("alert alert-danger alert-dismissible show text-center").css({"font-size":"12.368px"}).append('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>');
            }
        }
    </script>
</html>