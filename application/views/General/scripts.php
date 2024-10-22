
    <!--**********************************
        Main wrapper end
    ***********************************-->
	</div>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/global/global.min.js"></script>
	<script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?PHP ECHO BASE_URL(); ?>/template/vendor/select2/js/select2.full.min.js"></script>
    <script src="<?PHP ECHO BASE_URL(); ?>/template/js/plugins-init/select2-init.js"></script>
	<!-- Apex Chart -->
	<script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/apexchart/apexchart.js"></script>
	
	<script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/peity/jquery.peity.min.js"></script>
	

    <!-- Datatable -->
    <script src="<?PHP ECHO BASE_URL(); ?>/Template/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?PHP ECHO BASE_URL(); ?>/Template/js/plugins-init/datatables.init.js"></script>

	

    <script src="<?PHP ECHO BASE_URL(); ?>/Template/js/custom.min.js"></script>
	<script src="<?PHP ECHO BASE_URL(); ?>/Template/js/dlabnav-init.js"></script>
	<script src="<?PHP ECHO BASE_URL(); ?>/Template/js/demo.js"></script>
    <script src="<?PHP ECHO BASE_URL(); ?>/Template/js/styleSwitcher.js"></script>
	
		<script>
    function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				//nav:true,
				center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>
	<!-- New -->
    <!-- <script src="<?PHP ECHO BASE_URL(); ?>/template/js/new/test13.js"></script>-->
    <script src="<?PHP ECHO BASE_URL(); ?>/template/js/new/test25.js"></script>
    <script src="<?PHP ECHO BASE_URL(); ?>/template/js/new/btab5.js"></script>
	

	
    
   
	
    
	<script>
    $(document).ready(function() {
        $('#single-select').change(function() {
            // Obtener el valor del cliente seleccionado
            var selectedOption = $(this).find('option:selected');
            var ciNitValue = selectedOption.data('ci'); // Obtener el CI/NIT del atributo data-ci
            
            // Actualizar el campo de entrada ciNit
            $('#ciNit').val(ciNitValue);
        });
    });
</script>

</body>
</html>