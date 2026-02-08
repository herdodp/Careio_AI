<?php 

include "koneksi.php";

session_start();

$getk = $_GET['k'];

if(isset($_SESSION['username'])){

	if($getk == "h5"){
		?>
		<script>
			window.location.href = "file/versi1.6/careio_model.h5";
			setTimeout(function(){
				alert("Berhasil mendownload model h5");
				window.location.href = "../index.php";
			}, 1000);
		</script>
		<?php  
	}else if($getk == "keras"){
		?>
		<script>
			window.location.href = "file/versi1.6/careio_model.keras";
			setTimeout(function(){
				alert("Berhasil mendownload model keras");
				window.location.href = "../index.php";
			}, 1000);
		</script>
		<?php  
	}else if($getk == "tflite"){
		?>
		<script>
			window.location.href = "file/versi1.6/careio_model.tflite";
			setTimeout(function(){
				alert("Berhasil mendownload model tflite");
				window.location.href = "../index.php";
			}, 1000);
		</script>
		<?php  
	}

}else{
	?>
	<script>
		setTimeout(function(){
			alert("Login dahulu untuk mendownload");
			window.location.href = "user/login.php";
		}, 1000);
	</script>
	<?php  
}



 ?>