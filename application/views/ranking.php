<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WarGame-L.A.T</title>
 <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/components/icon.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
  <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/nav.css">
  <style>
      html,body
      {
          background: url("<?php echo base_url(); ?>img/bg-min.png");
      }
      .table-ranking
      {
        border-left: 1px dashed #dee2e6;
      }

  </style>
</head>
<body>
	<?php include('nav.php'); ?>
  <div class="card">
    <div class="card-header" style="font-size: 35px;">
     <i class="flag checkered icon"></i> Bảng xếp hạng
    </div>
    <div class="card-body">
      <table class="table table-striped table-light table-hover">
      <thead>
        <tr>
          <th scope="col" class="table-ranking">#</th>
          <th scope="col" class="table-ranking">Đội</th>
          <th scope="col" class="table-ranking">Điểm</th>
          <!-- <th scope="col">Handle</th> -->
        </tr>
      </thead>
      <?php if(count($data_array) != 0){ ?>
      <tbody>
        <?php $i = 1; ?>
        <?php while($i<=1){ ?>  
        <?php foreach ($data_array as $key => $value): ?>
          <tr>
            <th scope="row" class="table-ranking"><?php echo $i;$i++?></th>
            <td class="table-ranking"><a href=''><?php echo $value['team']; ?></a></td>
            <td class="table-ranking"><?php echo $value['score']; ?></td>
          </tr>
        <?php endforeach ?>
        <?php } ?>  
      </tbody>
      <?php } ?> 
      </table>
    </div>
  </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>js/csrf.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" pw="latcompany"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
