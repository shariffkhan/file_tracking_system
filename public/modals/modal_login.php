<div class="modal fade" id="mylog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <form action="login.php" class="form-validate" method="POST" >

                    <div class="panel panel-body login-form">

                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><img src="assets/images/ifm.png" style="height: 100px; z-index: -1000;" ></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" name="email" placeholder="Email" name="username" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" name="password" placeholder="Password" name="password" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled">
                                        Remember
                                    </label>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <a href="recover.php">Forgot password?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name = "submitted" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                        </div>

                    </div>
                </form>


        </div>
