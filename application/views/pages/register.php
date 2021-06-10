<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <?=$loginStyle?>
</head>
<body>
    <?=$loginScript?>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php echo form_open('Register/validate') ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="name" placeholder="Your Name" value="<?php if(isset($_POST['nama'])) echo $_POST['nama'];    ?>"/>
                            </div>
                            <?= form_error('nama', "<div style='color: red;'>", "</div>") ?>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
                            </div>
                            <?= form_error('email', "<div style='color: red;'>", "</div>") ?>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <?= form_error('password', "<div style='color: red;'>", "</div>") ?>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <?= form_error('confirm_password', "<div style='color: red;'>", "</div>") ?>
                            <div class="form-group">
                                <label for="notelp"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="notelp" id="notelp" placeholder="Nomor Telepon" value="<?php if(isset($_POST['notelp'])) echo $_POST['notelp']; ?>"/>
                            </div>
                            <?= form_error('notelp', "<div style='color: red;'>", "</div>") ?>
                            <div class="form-group">
                                <label for="tgl"><i class="zmdi zmdi-calendar-note"></i></label>
                                <input type="date" name="tanggal_lahir" id="tgl" value="<?php if(isset($_POST['tanggal_lahir'])) echo $_POST['tanggal_lahir']; ?>"/>
                            </div>
                            <?= form_error('tanggal_lahir', "<div style='color: red;'>", "</div>") ?>                      
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                        <?php echo form_close() ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?= base_url('assets/loginAssets/images/signup-image.jpg')?>" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
</html>