<?php
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){ 
?>
<style>
  button{
    margin: 5px;
  }
</style>
<?php
  $id = $_POST['id'];
  $sql = "SELECT * FROM fms_g17_consumptions_reports WHERE id = '$id'";
  $stmt = $this->conn()->query($sql);
  $row = $stmt->fetch();
  	if ($stmt->rowcount() > 0) { ?>

  		<div class="form-group" style="padding: 10px;">
		  <label for="project_list_id" class="col-sm-12">Consumptions Reports</label>
		    <textarea name="description" id="editor2" cols="30" rows="10">
		    	<?php echo htmlspecialchars($row['description']) ?>
		    </textarea>
		</div>

  	<?php } ?>

<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

<?php  } }
$data = new data();
$data->managedata();
?>

<?php include 'footer.php'; ?>
<script>
  $(document).ready(function() {
    var editor = CKEDITOR.replace('editor2');
  });
</script>