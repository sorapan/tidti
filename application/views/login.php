<!DOCTYPE html>

<?=header_url()?>

<body>

<div class="contain col-xs-12 nopad">
    <div class="login  col-md-offset-2 col-xs-12 col-sm-12 col-md-8 nopad">
        <div class="_1 col-xs-12 col-sm-4">
                <h2 class="opensans bold">SrivijayaWifi <i class="fa fa-wifi wifi" aria-hidden="true"></i></h2>
                <p class=" thaisans">ลงทะเบียนอุปกรณ์เพื่อเข้าใช้งานอินเทอร์เน็ต</p>
                <div class="footer">
                    <h2 class="">มีปัญหาติดต่อ งานวิศวกรรมเครือข่าย <br>สำนักวิทยบริการฯ</h2>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> : 074-317100 ต่อ 1911 - 1912 </p>
                </div>
        </div>
        <div class="_2 col-xs-12 col-sm-8">

            <!-- <div class="form  col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
                <div class="head">
                    <h2 class="thaisans bold">เข้าสู่ระบบ</h2>
                </div>
 -->

                <form method="post" class="form  col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10" action="std_logincheck">
                <!-- <div class="form  col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10"> -->
                    <div class="head">
                        <h2 class="thaisans bold">เข้าสู่ระบบ</h2><?php
                        if(null!==$this->session->userdata('alert')){
                        ?>
                            <h3 style="display: block;font-size: 1.2em"><i style="color:red" class="fa fa-times-circle" aria-hidden="true"></i> <?=$this->session->userdata('alert')?></h3>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="input">
                        <div class="inputbox">
                            <div class="col-xs-offset-1 col-xs-10 col-sm-10 col-md-offset-1 col-md-10 nopad">
                                <label><i class="glyphicon glyphicon-user"></i></label>
                                <input type="text" class="id opensans" name="e_pass" id="" placeholder="e-passport">
                            </div>
                        </div>
                        <div class="inputbox">
                            <div class="col-xs-offset-1 col-xs-10 col-sm-10 col-md-offset-1 col-md-10 nopad">
                                <label><i class="glyphicon glyphicon-lock"></i></label>
                                <input type="password" class="pass opensans" name="pass" id="" placeholder="password">
                            </div>
                        </div>

                        <!--<div class="box col-xs-offset-1 col-xs-10 col-md-offset-1 nopad">
                            <div class="status"><h2 class="thaisans bold">สถานะ</h2></div>
                            <div>
                                <input type="radio" name="radio" id="student" class="radio" value="0" checked/>
                                <label for="student"><span class="thaisans">นักศึกษา</span></label>
                            </div>

                            <div>
                                <input type="radio" name="radio" id="teacher" class="radio" value="1" />
                                <label for="teacher"><span class="thaisans">อาจารย์</span></label>
                            </div>
                        </div>-->

                    </div>
                        <div class="submit">
                            <input type="submit" class="" value="เข้าสู่ระบบ">
                        </div>

                    <!-- </div> -->

                </form>




        </div>

    </div>
</div>

<!--<form method="post" action="std_logincheck">

<input type="text" name="e_pass"></input>
<input type="password" name="pass"></input>
<input type="submit" value="confirm"></input>

</form>

<br>
<a href="admin/login">ADMIN PAGE</a>-->


</body>
</html>
