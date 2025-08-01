<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $_SESSION["mainLabel"]; ?>
        <small><?php echo $_SESSION["subDesc"]; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $_SESSION["CurController"]; ?></a></li>
        <li class="active"><?php echo $_SESSION["CurMenuLabel"]; ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="error-page">
    <h2 class="headline text-red">500</h2>

    <div class="error-content">
      <h3><i class="fa fa-warning text-red"></i> 
      <?php 
        if($_SESSION['exceptionFlag'] == 1)
        {
          echo $_SESSION['exceptionHeader'];
        }
        else
        {
          echo 'Oops! Something went wrong.';
        }
      ?>
    </h3>

      <p>
      <?php 
        if($_SESSION['exceptionFlag'] == 1)
        {
            echo '<p>' . $_SESSION['exceptionMsg'] . '</p><p>You may <a href="dashboard1.php">return to dashboard</a></p>';
        }
        else
        {
          echo 'We will work on fixing that right away.
          Meanwhile, you may <a href="index.php?page=2">return to dashboard</a>';
        }
        $_SESSION['exceptionFlag'] = 0;
        $_SESSION['exceptionHeader'] = "";
        $_SESSION['exceptionMsg'] = "";
      ?>
      </p>
    </div>
  </div>
  <!-- /.error-page -->

</section>
<!-- /.content -->

<script>
    
</script>