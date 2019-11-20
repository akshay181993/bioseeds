			<!-- footer -->
		<div class="footer">
			<p>© <?= date('Y'); ?> KumarSeeds . All Rights Reserved.</p>
		</div>
		<!-- //footer -->
	</section>
	<script src="<?= base_url(); ?>public/assets/js/bootstrap.js"></script>
	<script src="<?= base_url(); ?>public/assets/js/proton.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/css/popper.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/responsive.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/plugins/ckeditor/config.js"></script>
	<!-- calendar -->
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/monthly.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>public/assets/js/custom_function.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$(".select2").select2();
			$('#myTable').DataTable();

			if($('#editor1').length > 0){
				CKEDITOR.replace('editor1');
			}
			if($('#editor2').length > 0){
				CKEDITOR.replace('editor2');
			}
			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});
			
			loader();
		});
		
		function loader()
		{
			$(".se-pre-con").delay(1000).fadeOut();
		}

		function toggle(input,id) {
			    var x = document.getElementById(input);
			    if (x.type === "password") {
			        x.type = "text";
			        $("#"+id).attr('class', 'fa fa-eye-slash');

			    } else {
			        x.type = "password";
			        $("#"+id).attr('class', 'fa fa-eye');
			    }
			}
		// window.setTimeout(function() {
		// 	$(".alert").fadeTo(500, 0).slideUp(500, function(){
		// 		$(this).remove(); 
		// 	});
		// }, 3000);
	</script>
</body>
</html>