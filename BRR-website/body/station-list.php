<?php
	/*if(	(isset($_GET['team']) && !empty($_GET['team']))
	&&	(isset($_GET['remove']) && !empty($_GET['remove']))){
		$team_id = $_GET['team'];
		$remove = $_GET['remove'];
		
		$delete_team_error = "";
		
		if($remove == 1) {
			if(!does_team_exist($team_id)) {
				$delete_team_error = "This team does not exist.";
			}
			
			else if(!is_team_empty($team_id)) {
				$delete_team_error = "This team can not be deleted because it has some data.";
			}
			
			else {
				delete_team($team_id);
				header('Location:index.php?page=team-list&team-deleted=1');
			}
		}
	}*/

	$search = "";
	
	if(isset($_POST['submit'])) {
		$search = htmlspecialchars(trim($_POST['search']));
	}
?>

<h2 class="page-title">Station List</h2>
		
<?php
	/*if(isset($delete_team_error)) {
		?>
			<p class="alert alert-danger" role="alert"><?=$delete_team_error?></p>
		<?php
	}
	
	else if(isset($_GET['team-deleted']) && !empty($_GET['team-deleted']) && ($_GET['team-deleted'] == 1)) {				
		?>
			<p class="alert alert-success" role="alert">The team has been succefully deleted.</p>
		<?php
	}
	
	else if(isset($_GET['team-added']) && !empty($_GET['team-added']) && ($_GET['team-added'] == 1)) {				
		?>
			<p class="alert alert-success" role="alert">The team has been succefully added.</p>
		<?php
	}
	
	else if(isset($_GET['team-modified']) && !empty($_GET['team-modified']) && ($_GET['team-modified'] == 1)) {				
		?>
			<p class="alert alert-success" role="alert">The team has been succefully modified.</p>
		<?php
	}*/
?>

<form method="post" class="form-inline my-2">
	<div class="input-group">
		<input class="form-control" type="text" style="text-align:right" placeholder="Search" name="search" id="search" aria-label="Search" <?php
			if(isset($_POST['submit'])) {
				?>
					value="<?= $_POST['search']?>"
				<?php
			}
		?>>    
		<span class="input-group-btn">
			<button class="btn  btn-default" type="submit" id="submit" name="submit">Search</button>
		</span>
	</div>
</form>
<table class="table table-bordered table-striped table-condensed">           
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Code</th>
			<th>Length From Start</th>
			<th>
				<a class="bg-success text-white table-button" href="index.php?page=manage-station">+</a>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach(search_station($search) as $station) {		
			?>		
				<tr>
					<td><?=$station->ID?></td>
					<td><?=$station->Name?></td>
					<td><?=$station->Code?></td>
					<td><?=$station->LengthFromStart?></td>
					<td class="no-change">
						<a class="bg-primary text-white table-button" href="index.php?page=manage-station&station=<?=$station->ID?>">...</a>
						<a class="bg-danger text-white table-button" onclick="DeleteAlert('station', <?= $station->ID ?>);" href="#">X</a>
					</td>
				</tr>
			<?php
		}
	?>					
	</tbody>
</table>