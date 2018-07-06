<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Inventories\Categories;

$inventory = new Categories();

$categories = $inventory->all();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Forms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form action="process.php" class="form-horizontal" method="post">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Overview</label>
				<div class="col-sm-10">
					<textarea name="overview" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Driving</label>
				<div class="col-sm-10">
					<textarea name="driving" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">On the inside</label>
				<div class="col-sm-10">
					<textarea name="on the inside" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Owning</label>
				<div class="col-sm-10">
					<textarea name="owning" class="form-control"></textarea>
				</div>
			</div>


			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Specification</label>

				<div class="col-sm-10">
					<div class="row">
						<?php foreach ($categories as $category): ?>
							<div class="col-sm-6">
								<h3 class="subtitle"><?php echo $category->getName(); ?></h3>

								<div class="row">
									<?php foreach ($category->getSubCategories() as $subcategory): ?>
										<div class="col-sm-12">
											<?php echo $subcategory->getName(); ?>
										
											<div class="row">
												<?php foreach ($subcategory->getSpecifications() as $specification): ?>
													<div class="col-sm-12">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-6 control-label"><?php echo $specification->getName(); ?></label>
															<div class="col-sm-6">
																<?php if ($specification->getType() == 'string'): ?>
																	<input type="text" name="specifications[<?php echo $specification->getId(); ?>]"/>
														 		<?php else: ?>
																 	<input type="checkbox" name="specifications[<?php echo $specification->getId(); ?>]" value="1"/>
																<?php endif; ?>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Servicing</label>
				<div class="col-sm-10">
					<textarea name="servicing" class="form-control"></textarea>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image1" class="form-control" placeholder="Url"/>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image2" class="form-control" placeholder="Url"/>
						</div>
					</div>			
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image3" class="form-control" placeholder="Url"/>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<input type="text" name="image4" class="form-control" placeholder="Url"/>
						</div>
					</div>			
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default active">Submit</button>
				</div>
			</div>

		</form>
	</div>
</body>
</html>
