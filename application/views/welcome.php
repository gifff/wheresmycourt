
                        <div class="container">
                            <div class="content">
                                <h3>An athlete cannot run with money in his pockets. He must run with hope in his heart and dreams in his head.”</h3>
                                <h3> Enjoy Your Game, Lets Do This!</h3>
                                <br>
                                <!-- <a class="btn btn-primary my-btn" data-toggle="modal" data-target="#myModalRegister">Register</a> -->
                                <a class="btn btn-primary my-btn" href="<?php echo site_url('auth/register/');?>">Register</a>
                                <a class="btn btn-primary my-btn2" data-toggle="modal" data-target="#myModal">Login</a>
                            </div>
                        </div>
                        <!------------------------------------- Modal Login ----------------------------------------->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <?php
                                $login = array(
                                    'name'  => 'login',
                                    'id'    => 'login',
                                    'value' => set_value('login'),
                                    'maxlength' => 80,
                                    'size'  => 30,
                                    'class' => 'form-control',
                                    'autofocus' => 1,
                                    'required' => 'required'
                                );
                                if ($login_by_username AND $login_by_email) {
                                    $login_label = 'Email or login';
                                    $login['placeholder'] = 'Email or Username';
                                } else if ($login_by_username) {
                                    $login_label = 'Login';
                                    $login['placeholder'] = 'Username';
                                } else {
                                    $login_label = 'Email';
                                    $login['placeholder'] = 'Email';
                                }
                                $password = array(
                                    'name'  => 'password',
                                    'id'    => 'password',
                                    'size'  => 30,
                                    'class' => 'form-control',
                                    'placeholder' => 'Password',
                                    'required' => 'required'
                                );
                                $remember = array(
                                    'name'  => 'remember',
                                    'id'    => 'remember',
                                    'value' => 1,
                                    'checked'   => set_value('remember'),
                                    'style' => 'margin:0;padding:0',
                                );
                                $captcha = array(
                                    'name'  => 'captcha',
                                    'id'    => 'captcha',
                                    'maxlength' => 8,
                                );
                                ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Login</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open( site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http')); ?>
                                        <div class="form-group">
                                            <!--<label for="email"><?= $login_label; ?></label>
                                            <input type="email" class="form-control" id="<?= $login['id'];?>" placeholder="<?= $login['placeholder']; ?>">-->
                                            <?php echo form_label($login_label, $login['id'], array('class' => 'sr-only')); ?>
                                            <?php echo form_input($login); ?>
                                            <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?'<span class="label label-danger">' . $errors[$login['name']] . '</span>':''; ?>
                                        </div>
                                        <div class="form-group">
                                            <!--<label for="<?= $password['id']; ?>">Password:</label>
                                            <input type="password" class="form-control" id="<?= $password['id']; ?>" placeholder="<?= $password['placeholder']; ?>">-->
                                            <?php echo form_label('Password', $password['id'], array('class' => 'sr-only')); ?>
                                            <?php echo form_password($password); ?>
                                            <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? '<span class="label label-danger">' . $errors[$password['name']] . '</span>':''; ?>
                                        </div>
                                        <div class="form-group">
                                            <?php if ($show_captcha) {
                                            if ($use_recaptcha) { ?>
                                            <?php echo $recaptcha_html; ?>
                                            <div class="label-danger" style="color: white;">
                                                <?php echo form_error('g-recaptcha-check'); ?>
                                            </div>
                                            <?php } else { ?>
                                            <p>Enter the code exactly as it appears:</p>
                                            <?php echo $captcha_html; ?>
                                            <div>
                                                <?php echo form_label('Confirmation Code : ', $captcha['id']); ?>
                                                <?php echo form_input($captcha); ?>
                                                <div class="label-danger" style="color: white;"><?php echo form_error($captcha['name']); ?></div>
                                            </div>
                                            <?php }
                                            } ?>
                                        </div>
                                        <div class="checkbox">
                                            <?php echo form_checkbox($remember); ?>
                                            <?php echo form_label('Remember me', $remember['id']); ?>
                                            <!--<label><input type="checkbox"> Remember me</label>-->
                                        </div>
                                        <?php echo anchor('/auth/forgot_password/', 'Forgot the password?', array('class' => 'btn btn-default')); ?>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------------- Modal Register ----------------------------------------------------->
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModalRegister" role="dialog">
                        <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Register</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="namaLengkap">Nama Lengkap:</label>
                                        <input type="namaLengkap" class="form-control" id="namaLengkap" placeholder="Enter Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="username" class="form-control" id="username" placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password:</label>
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="notelp">No Telepon:</label>
                                        <input type="notelp" class="form-control" id="notelp" placeholder="Enter telpon">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"Register>Close</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div id="tf-service">
            <div class="container">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left media-middle">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Futsal</h4>
                            <p>Permainan bola yang dimainkan oleh dua tim, yang masing-masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki. Selain lima pemain utama, setiap regu juga diizinkan memiliki pemain cadangan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left media-middle">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Badminton</h4>
                            <p>suatu olahraga raket yang dimainkan oleh dua orang (untuk tunggal) atau dua pasangan (untuk ganda) yang saling berlawanan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left media-middle">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Basket</h4>
                            <p> olahraga bola berkelompok yang terdiri atas dua tim beranggotakan masing-masing lima orang yang saling bertanding mencetak poin dengan memasukkan bola ke dalam keranjang lawan.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div id="tf-portfolio">
            <div class="container">
                <div class="section-title">
                    <h3>My Latest Works</h3>
                    <hr>
                </div>
                <div class="space"></div>
                <div id="tf-about">
                    <div class="overlay">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-6">
                                    <h3>News</h3>
                                    <br>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    <p>Metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                    <br>
                                    <a href="#tf-why-me" class="btn btn-primary my-btn dark">Why Hire Me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tf-contact">
            <div class="container">
                <div class="section-title">
                    <h3>Contact Me</h3>
                    <p>Cras sit amet nibh libero, in gravida nulla. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                    <hr>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="contact">
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Website">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary my-btn dark">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>