<div class="container mt-5" style="margin-top: 1rem!important;">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-2">
                <div class="card-header text-white" style="background: #880000;">
                    <?php echo $level['title'] ?> <span class="badge badge-success"><?php echo $level['score']; ?> Point</span>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url(); ?>Level/submit/<?php echo base64_encode($level['title']); ?>" method="POST" id="" class="mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo base_url(); ?>icon/lock.svg" alt="lock" width="20px" height="20px"></span></div>
                            <!-- <i class="fas fa-lock"></i> -->
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <input type="text" class="form-control" name="password" id="password" placeholder="Mật khẩu..." autocomplete="off" autofocus required>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-dark ml-2"><img src="<?php echo base_url(); ?>icon/tick-inside-circle.svg" alt="" width="20px" height="20px"><!-- <i class="far fa-check-circle"></i> --> Kiểm tra</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    Câu hỏi : <?php echo $level['hint'] ?>
                </div>
            </div>

         <?php include('wrong.php'); ?>
        </div>
    </div>
</div>