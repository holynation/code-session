<?php
$siteLink = "https://nairaboom.ng";
$appLink = "https://nairaboom.ng/customer_dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Nairaboom">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="icon" type="image/icon" href="<?php echo base_url('assets/nairaboom_favicon.ico'); ?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Page Title  -->
    <title>Report | Nairaboom</title>
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
          <div class="nk-content">
            <div class="nk-block nk-block-middle nk-auth-body">
              <div class="brand-logo text-center">
                <a href="<?=$siteLink?>" class="logo-link">
                  <div class="mb-3">
                    <img src="<?php echo base_url('assets/nairaboom_logo.svg'); ?>" alt="" style="width: 20rem;height: 10rem;" class="logo-dark">
                  </div>
                </a>
              </div>
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="text-center">
                      <?php if ($webSessionManager->getFlashMessage('error')): ?>
                      <div class="alert alert-danger">
                        <p class="">
                          <?=$webSessionManager->getFlashMessage('error');?>
                        </p>
                      </div>
                      <?php endif;?>

                      <?php if ($webSessionManager->getFlashMessage('success')): ?>
                      <div class="alert alert-success">
                        <p class="">
                          <?=$webSessionManager->getFlashMessage('success')?>
                        </p>
                      </div>
                      <?php endif;?>
                      <a href="<?=$appLink;?>" class="btn btn-primary">Go back Home</a>
                    </div>
                </div>
              </div>
            </div><!-- .nk-block -->
            <div class="nk-block text-center nk-auth-footer-full">
              <div class="mt-3">
                <script>
                  document.write(new Date().getFullYear());
                </script>
                Nairaboom. All Rights Reserved | Powered by
                <a href="https://codefixbug.com" target="_blank" class="footer-link fw-bolder">Codefixbug Limited.</a>
              </div>
            </div><!-- .nk-block -->
          </div>
          <!-- wrap @e -->
        </div>
        <!-- content @e -->
      </div>
      <!-- main @e -->
  </div>
</body>
</html>