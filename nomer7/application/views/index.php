<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 300px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Data</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                        <th>Name</th>
                        <th>Hobby</th>
						<th>Category</th>
                        <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($arkademy as $data){
                ?>
                    <tr>
                        <td><?php echo $data['name']?></td>
                        <td><?php echo $data['hobby']?></td>
						<td><?php echo $data['category']?></td>
                        <td>
                            <a 
							data-id_data="<?php echo $data['id']?>"
							data-nama="<?php echo $data['name']?>"
							data-id_hobi="<?php echo $data['id_hobby']?>"
							data-id_kategori="<?php echo $data['id_category']?>"
							  href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#" data-href='<?php echo base_url('c_arkademy/hapus_data/').$data['id']; ?>' class="delete" data-toggle="modal" data-target="#confirm_delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">						
						<h4 class="modal-title">Add Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
				<form id="add_data">
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="nama" id="nama" required>
						</div>
						<div class="form-group">
							<label>Hobby</label>
							<select class="form-control" name="hobi" id="hobi">
                                <?php foreach($hobby as $hobby2) {
                                ?>
                                <option value="<?php echo $hobby2['id']?>"><?php echo $hobby2['name']?></option>
                                <?php }
                                ?>
                            </select>
						</div>
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="ketegori" id="kategori">
                                <?php foreach($category as $category2) {
                                ?>
                                <option value="<?php echo $category2['id']?>"><?php echo $category2['name']?></option>
                                <?php }
                                ?>
                            </select>
						</div>					
					</div>
					<div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" id="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="edit_data" method="post">
                    <div class="modal-header">						
						<h4 class="modal-title">Edit Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="hidden" class="form-control" name="id_data" id="id_data" required>
							<input type="text" class="form-control" name="nama" id="nama2" required>
						</div>
						<div class="form-group">
							<label>Hobby</label>
							<select class="form-control" name="hobi" id="hobi2">
                                <?php foreach($hobby as $hobby2) {
                                ?>
                                <option value="<?php echo $hobby2['id']?>"><?php echo $hobby2['name']?></option>
                                <?php }
                                ?>
                            </select>
						</div>
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="kategori" id="kategori2">
                                <?php foreach($category as $category2) {
                                ?>
                                <option value="<?php echo $category2['id']?>"><?php echo $category2['name']?></option>
                                <?php }
                                ?>
                            </select>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="confirm_delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<a class="btn-ok"><button type="button" class="btn btn-danger btn-ok">Ya</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>       
<script>
$(document).ready(function () {
  $('#add_data').submit(function (e) {
		e.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
          url: "<?php echo base_url('c_arkademy/add_data'); ?>",
          method: "POST",
          data: form_data,
          processData: false,
          contentType: false,
          cache: false,
          async:true,
          success: function (respons) {
           
              window.location = "<?php echo base_url(); ?>";
           
          },
          error: function (error) {
            bootoast.toast({
              message: 'Gagal menambah.',
              type: 'danger'
            });
          }
        })
      });
      $('#edit_data').submit(function (e) {
		e.preventDefault();
    var form_data = new FormData(this);
        $.ajax({
          url: "<?php echo base_url('c_arkademy/edit_data'); ?>",
          method: "POST",
          data: form_data,
          processData: false,
          contentType: false,
          cache: false,
          async:true,
          success: function (respons) {
           
              window.location = "<?php echo base_url(); ?>";
          },
          error: function (error) {
            bootoast.toast({
              message: 'Gagal menyimpan data karyawan.',
              type: 'danger'
            });
          }
        })
      });
    });
	$(document).on("click", ".edit", function () {
		  var id_data = $(this).data('id_data');
          var nama = $(this).data('nama');
          var hobi = $(this).data('id_hobi');
		  var kategori = $(this).data('id_kategori');
		  $("#id_data").val(id_data);
		  $("#nama2").val(nama);
          $("#hobi2").val(hobi);
          $("#kateogri2").val(kategori);
      });
	  $(document).ready(function() {
          $('#confirm_delete').on('show.bs.modal', function(e) {
              $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
          });
      });
</script>                         		                            