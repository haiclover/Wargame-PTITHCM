<?php include('header.php'); ?>
<body>
<?php include('nav.php'); ?>
<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$url = base_url()."ranking";
?>
<script>
    var url_direct = "<?php echo $url ?>";
    var time_set = "<?php echo $time_limit ?>";
    CountDownTimer(time_set, 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {
                window.location.replace(url_direct);
                clearInterval(timer);
                //document.getElementById(id).innerHTML = 'Hết giờ!';
                return;
            }
            // var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            // document.getElementById(id).innerHTML = days + ' ngày ';
            document.getElementById(id).innerHTML = hours + ' giờ ';
            document.getElementById(id).innerHTML += minutes + ' phút ';
            document.getElementById(id).innerHTML += seconds + ' giây';
        }

        timer = setInterval(showRemaining, 1000);
    }

</script>
<div id="countdown" style="color:white"></div>

        <div class="container mt-5" style="margin-top: 1rem!important;">
                <div class="row">
                    <?php if(isset($level) || count($user) != 0){ ?>
                        <?php for($i=0;$i<count($level);$i++){ ?>
                            <div class='square-box mr-2 mb-3'>
                                <div class='square-content' 
                                    <?php if(count($user) != 0) {
                                        $level_pass = $user[0]['level_pass'];
                                        if($level_pass != null){ $level_pass = explode("|", $level_pass); }
                                        for ($j = 0; $j < count($level_pass); $j++) 
                                        {
                                            if(isset($level_pass[$j]) && $level_pass[$j] == $level[$i]['title'])
                                            {
                                                echo "style='background:green;'";
                                            }
                                        }
                                    }?> >
                                    <div>
                                        <a href="<?php echo base_url()."Level/".base64_encode($level[$i]['title']); ?>" id="button" style="color:black"><?php echo $i+1; ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
        </div>
<script>$(function () {
  $('[data-toggle="popover"]').popover()
})</script>
<script src="<?php echo base_url(); ?>/js/csrf.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
</body>

</html>