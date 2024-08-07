<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="<?PHP ECHO BASE_URL(); ?>/Template/images/logo.jpg" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4"><?php echo($mensaje); ?></h4>
                                    <form method="POST" accept-charset="utf-8"  class="user text-left"  action="<?PHP ECHO BASE_URL('index.php/sesion/validarusuario')?>">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Usuario</strong></label>
                                            <input type="text" class="form-control form-control-user" name="login" aria-describedby="emailHelp" placeholder="usuario0000" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Contraseña</strong></label>
                                            <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="*******" required>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Olvidaste tu contraseña?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
