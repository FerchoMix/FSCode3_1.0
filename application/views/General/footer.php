<!-- Footer -->

		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
 <!-- logout modal -->
 <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="logoutModal">Basic modal</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="logoutModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">¿Esta seguro de salir?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                                    
                                                    <a type="button" class="btn btn-primary" href="<?PHP ECHO BASE_URL();?>index.php/sesion/logout">Salir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

		<!-- End modal -->
