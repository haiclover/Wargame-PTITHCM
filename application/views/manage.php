<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage L.A.T</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/nav.css">
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <style>
        html,body
        {
            background: url("<?php echo base_url(); ?>img/polygon-cat-2.jpg");
        }
    </style>
</head>
<body>
    
<ul class="navbar">
    <li><a class="" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" style="width: 158px;" alt=""></a></li>
    <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>icon/home.svg" alt="" width="36px" ></a></li>
    <li><a href="<?php echo base_url(); ?>ranking"><img src="<?php echo base_url(); ?>icon/rank.svg" alt="" width="36px"></a></li>
    <li><a href="<?php echo base_url(); ?>login"><img src="<?php echo base_url(); ?>icon/sign-in.svg" alt="" width="36px"></a></li>
</ul>
    <div class="container-fluid mt-5" style="margin-top: 1rem!important;">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-2">
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>Admin/Time" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                            <h3 class="card-text">Nhập thời gian</h3><input type="text" name="time_limit" value="" placeholder="30,100,..." class="form-control">
                            <input type="submit" name="addtime" value="Hẹn giờ" class="btn btn-primary mt-2">
                            <br/>
                            <?php if(isset($_SESSION['time_set']))
                            {
                            	echo '<div class="badge badge-success">Bạn đã set thời gian thành công</div>';
                            } ?>
                        </form>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body mt-2">
                        <h3 class="card-text">Khởi tạo user</h3>
                        <form action="<?php echo base_url() ?>Admin/User" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                            Số user khởi tạo:<input type="number" name="num_user" value="" placeholder="Số lượng: 10,..." class="form-control" min="1">
                            <input type="submit" name="adduser" value="Thêm" class="btn btn-success mt-2">
                            <button type="button" class="btn btn-secondary mt-2"  data-toggle="modal" data-target="#modal_user">Xem</button>
                        </form>
                    </div>
                </div>
				<div class="modal fade" id="modal_user">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Danh sách tài khoản</h5>
								<button class="close" data-dismiss="modal">
									<span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Username</th>
											<th>Password</th>
											<th>Team</th>
										</tr>
									</thead>
									<?php 
									for($i=0;$i<count($user);$i++)
									{
									?>
									<tbody>
										<tr>
											<td><?php echo $user[$i]['username']; ?></td>
											<td><?php echo $user[$i]['password']; ?></td>
											<td><?php echo $user[$i]['team']; ?></td>
										</tr>
									</tbody>
									<?php
									}
									?>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
							</div>
						</div>
					</div>
				</div>
            </div>

            <div class="col-6">
                <div class="card mt-2">
                    <div class="card-body mt-2">
                        <h3 class="card-text">Nhập câu hỏi</h3>
                        <form action="<?php echo base_url() ?>Admin/Manage" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                            Tiêu đề:<input type="text" name="title" value="" placeholder="Nhập Tiêu đề..." class="form-control">
                            Câu hỏi: <input type="text" name="question" value="" placeholder="Nhập Câu hỏi..." class="form-control">
                            Đáp án: <input type="text" name="answer" value="" placeholder="Nhập Đáp Án..." class="form-control">
                            Điểm: <input type="text" name="point" value="" placeholder="Nhập Điểm..." class="form-control">
                            <input type="submit" name="addqs" value="Thêm dữ liệu" class="btn btn-warning mt-2">
                            <button type="button" class="btn btn-secondary mt-2"  data-toggle="modal" data-target="#modal_question">Xem</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_question">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Danh sách câu hỏi</h5>
								<button class="close" data-dismiss="modal">
									<span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Tiêu đề</th>
											<th>Câu hỏi</th>
											<th>Đáp án</th>
											<th>Điểm</th>
										</tr>
									</thead>
									<?php 
									for($i=0;$i<count($data_question);$i++)
									{
									?>
									<tbody>
										<tr>
											<td><?php echo $data_question[$i]['title']; ?></td>
											<td><?php echo $data_question[$i]['hint']; ?></td>
											<td><?php echo $data_question[$i]['flag']; ?></td>
											<td><?php echo $data_question[$i]['score']; ?></td>
										</tr>
									</tbody>
									<?php
									}
									?>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
							</div>
						</div>
					</div>
				</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-2">
                    <div class="card-body mt-2">
                        <h3 class="card-text">Xóa toàn bộ user</h3>
                        <form action="<?php echo base_url() ?>Admin/Delete_User" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                            <input type="submit" name="deleteuser" value="Xóa toàn bộ user" class="btn btn-danger mt-2">
                            <br>
                            <?php if(isset($_SESSION['delete_user']))
                            {
                            	echo '<div class="badge badge-success">Xóa thành công</div>';
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-2">
                    <div class="card-body mt-2">
                        <h3 class="card-text">Xóa Toàn Bộ Level</h3>
                        <form action="<?php echo base_url() ?>Admin/Delete_Level" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                            <input type="submit" name="deletelevel" value="Xóa toàn bộ level" class="btn btn-danger mt-2">
                            <br>
                            <?php if(isset($_SESSION['delete_level']))
                            {
                            	echo '<div class="badge badge-success">Xóa thành công</div>';
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
unset($_SESSION['delete_user']);
unset($_SESSION['delete_level']);
unset($_SESSION['time_set']);
?>