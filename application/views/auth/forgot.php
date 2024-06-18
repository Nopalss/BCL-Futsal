<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                            </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/forgotPassword') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="New Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check" name="check" required>
                                    <label class="form-check-label" for="check">
                                        I'am Not a Robot
                                    </label>
                                    <?= form_error('check', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success font-weight-bold btn-user btn-block">
                                New Password
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small text-success font-weight-bold" href="<?= base_url('auth') ?>">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                            <a class="small text-success font-weight-bold" href="<?= base_url('auth/registration')?>">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>