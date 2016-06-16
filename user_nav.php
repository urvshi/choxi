<div id="user_nav">
  <div class="container">
    <ul>
      <li><a href="<?php echo SITE_BASE; ?>">Home</a></li>
      <li>Customer Service</li>
      <?php
          if(isset($_SESSION['user']['loged_in']) && $_SESSION['user']['loged_in']='YES'){

        ?>
        <li><a href="<?php echo SITE_BASE; ?>account">My Account ( <?php echo $_SESSION['user']['email']; ?>)</a></li>
      
      <?php
      }
      else{
      ?>
        <li><a href="<?php echo SITE_BASE; ?>log_in.php">Log in / Register</a></li>  
      <?php
        }
      ?>
      <li><a href="<?php echo SITE_BASE; ?>checkout.php">cart</a></li>
    </ul>
  </div>
</div>