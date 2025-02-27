<?php
$siteLink = "https://nairaboom.ng";
$appLink = "https://nairaboom.ng";
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
    <title>Verification | Nairaboom</title>
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
                <a href="<?php echo $siteLink; ?>" class="logo-link">
                  <div class="mb-3">
                    <img src="<?php echo base_url('assets/nairaboom_logo.svg'); ?>" alt="" style="width: 20rem;height: 10rem;" class="logo-dark">
                  </div>
                </a>
              </div>
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <!-- this is the notification div -->
                    <?php  if(isset($type) && $type == 'verify_account'){ ?>
                    <div class="text-center">
                      <h3 class="nk-block-title">Welcome onboard</h3>
                      <?php if(isset($success)): ?>
                      <div class="nk-block-des text-success mb-4">
                        <p><?php echo $success; ?></p>
                      </div>
                    </div>
                    <div class="text-center">
                      <a href="<?php echo $appLink; ?>" class="btn btn-primary">Now Login</a>
                    </div>
                    <?php endif; } ?>

                    <?php if(isset($error)): ?>
                    <div class="nk-block-des text-danger">
                      <p class=""><?php echo $error; ?></p>
                    </div>
                    <?php endif;  ?>
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