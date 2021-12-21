
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/plugins/morris/morris.min.js"></script>

	<!-- Chart JS -->
	<script src="../assets/js/apexcharts.min.js"></script>
	<script src="../assets/js/dsh-apaxcharts.js"></script>
	
	<!-- Mask JS -->
	<script src="../assets/js/jquery.maskedinput.min.js"></script>
	<script src="../assets/js/mask.js"></script>

	<!-- Form Validation JS -->
	<script src="../assets/js/form-validation.js"></script>



	<!-- Custom JS -->
	<script src="../assets/js/select2.min.js"></script>
	<script src="../assets/js/script.js"></script>


	<script type="text/javascript">
		$("#title").keyup(function(){
			$("#slug").val($(this).val().toLowerCase().split(",").join("").replace(/\s/g,"-"));
		});
	</script>

</body>

</html>







