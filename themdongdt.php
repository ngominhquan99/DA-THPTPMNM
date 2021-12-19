<?php
include "index_backend.php";
?>
<script src="../assets/js/jQuery-2.1.4.min.js"></script>
<script src="../assets/js/validator.js"></script>
<script src="../assets/js/validator.min.js"></script>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 >
			Quản Lý Dòng Sản Phẩm
		</h1>
		<hr/>
		<ol class="breadcrumb">
			<li><a href="index_backend.php"><i class="fa fa-dashboard"></i>Admin</a></li>
			<li class="active">Quản lý dòng Sản Phẩm</li>
		</ol>
	</section>

	<div class="row">
		<div class="col-md-12">
			<section class="content">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Thêm dòng Sản Phẩm</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
						</div>
					</div><!-- /.box-header -->
					<form action="#" data-toggle="validator" role="form"  method="post" accept-charset="utf-8">	           
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Mã thương hiệu</label>
										<input type="text" class="form-control" pattern="^[_A-z0-9]{1,}$" name="input_add_id_brand" data-error="Không được viết có dấu và kí tự đặt biệt!!"  placeholder="vd: th01" required>
										<div class="help-block with-errors"></div>
									</div><!-- /.form-group -->

									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Thêm"> &nbsp;&nbsp;
										<button type="reset" class="btn btn-default">Làm lại</button>
									</div><!-- /.form-group -->

								</div><!-- /.col -->
								<div class="col-md-6">
									<div class="form-group">
										<label>Tên thương hiệu</label>
										<input type="text" pattern="^[a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$" name="input_add_name_brand" class="form-control" placeholder="vd: SONY " data-error="Không được có kí tự số và kí tự đặt biệt!" required>
										<div class="help-block with-errors"></div>
									</div><!-- /.form-group -->
								</div><!-- /.col -->

							</div><!-- /.row -->
						</div><!-- /.box-body -->
					</form>
				</div><!-- /.box -->

				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Hiển thị hãng</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr style="background-color: #318CAA;color:white;">
											<th>Mã thương hiệu</th>
											<th>Tên thương hiệu</th>
											<th>Chi tiết</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT madienthoai
										FROM dienthoai ";
										$rs = mysqli_query($con, $sql);
										$result = "";
										if(mysqli_num_rows($rs) > 0){
											while($row = mysqli_fetch_array($rs)){
												$str = "<tr> 
												<td>{$row["madienthoai"]}</td>
												<td>{$row["tendienthoai"]}</td>
												<td><button type=\"button\" class=\"btn btn-primary btn-sm\" 
													onclick=\"chitietthuonghieu('{$row['madienthoai']}');\">Chi tiết</button></td> 
												</tr>";
												echo $str;
											}
										} else {
											$result = "<tr><td colspan = \"3\" align =\"center\"<p style=\"color:red;\">Không có hóa đơn!</p></td></tr>";
										}
										mysqli_free_result($rs);
										echo $result;
										?>

									</tbody>

									<tfoot>

									</tfoot>
								</table>

							</div>

						</div><!-- /.row -->
					</div><!-- /.box-body -->

				</div><!-- /.box -->


			</div><!-- /.row -->

		</div><!-- /.row -->




	</section><!-- /.content -->
</div>
<form action="#" method="post" accept-charset="utf-8" data-toggle="validator" role="form">
	<div class="modal fade " id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sửa thông tin hãng</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" id="div_brand">

						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
						<input type="submit" class="btn btn-primary" value="Xác nhận">
					</div>
				</div>
			</div>
		</div>	
	</div>
</form>

<script src="../assets/js/jQuery-2.1.4.min.js"></script>

<?php 
	if(!empty($_GET['ma'])){
	if($_GET['ma'] == 1){
?>
	<script>
		$(document).ready(function(){
			$.simplyToast('Thêm thành công!','success')
		});
	</script>
<?php
	}
?>

<?php 
	if($_GET['ma'] == 2){
?>
	<script>
		$(document).ready(function(){
			$.simplyToast('Thêm thất bại!','danger')
		});
	</script>
<?php
	}
?>

<?php 
	if($_GET['ma'] == 3){
?>
	<script>
		$(document).ready(function(){
			$.simplyToast('Sửa thành công!','success')
		});
	</script>
<?php
	}
?>

<?php 
	if($_GET['ma'] == 4){
?>
	<script>
		$(document).ready(function(){
			$.simplyToast('Sửa thất bại!','danger')
		});
	</script>
<?php
		}
	}
?>

<?php
include "includes/#";
?>


<script>
	$(function () {
		$('#example1').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [-1] //với giá trị xóa sort từ phải sang
   		 }]
		});
	});
	function alert_delete() 
	{
		alert("Bạn đã xóa thành công!!!");
	}
</script>
<div>

</div>
<script type="text/javascript">
	function chitietthuonghieu(mathuonghieu){
		$('#myModal').modal('show');
		$.post(
			'manager_brands_show_brand.php', 
			{
				mathuonghieu : mathuonghieu
			}, function(data){
				$('#div_brand').html(data);
			});
	}
</script>

<script type="text/javascript"></script>
