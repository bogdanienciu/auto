<?php require_once('mysql.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>auto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="auto.css">
</head>
<body>
	<div class="container page">
		<div class="row-top">
			<div class="row">
				<div class="col-xs-10">
					<div class="main">
						<img src="<?php echo $car->getProfilePicture()->getUrl(); ?>" class="img-responsive" alt=" Audi A6">
					</div>
				</div>

				<div class="col-xs-2">
					<div class="row">
						<?php foreach ($car->getCarPictures() as $picture): ?>
							<div class="col-xs-12">
								<div class="thumbnail preview">
									<img src="<?php echo $picture->getUrl(); ?>" alt="2018 Audi A6 Avant" class="img-responsive">
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row-bottom">
			<nav class="navbar navbar navbar-fixed">
				<div class="container-nav">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">A6</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="#overview">Overview</a></li>
							<li><a href="#driving">Driving</a></li>
							<li><a href="#ontheinside">On the inside</a></li>
							<li><a href="#owning">Owning</a></li>
							<li><a href="#specification">Specification</a></li>
							<li><a href="#servicing">Servicing</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div id="overview" class="col-sm-12 section_review_section">
			<div class="row_review_section">
				<div class="review_section">
					<h2 class="title">Overview</h2>
					<p>Running costs and reliability</p>
				</div>
			</div>
			<div class="col-sm-12">
				<?php echo $car->getOverview(); ?>
			</div>
			
		</div>

		<div id="driving" class="col-sm-12 section_review_section">
			<div class="row_review_section">
				<div class="review_section">
					<h2 class="title">Driving</h2>
					<p>What is it like on the road?</p>
				</div>
			</div>
			<div class="col-sm-12">
				<?php echo $car->getDriving(); ?>
			</div>
		</div>

		<div id="ontheinside" class="col-sm-12 section_review_section">
			<div class="row_review_section">
				<div class="review_section">
					<h2 class="title">On the inside</h2>
					<p>Layout, finish and space</p>
				</div>
			</div>
			<div class="col-sm-12">
				<?php echo $car->getOntheInside(); ?>
			</div>
		</div>

		<div id="owning" class="col-sm-12 section_review_section">
			<div class="row_review_section">
				<div class="review_section">
					<h2 class="title">Owning</h2>
					<p>Running costs and reliability</p>
				</div>
			</div>
			<div class="col-sm-12">
				<?php echo $car->getOwning(); ?>
			</div>
		</div>

		<div id="specification" class="col-sm-12 section_review_section">
			<div class="row_review_section">
				<div class="review_section">
					<h2 class="title">Specification</h2>
					<p>General Specs</p>
				</div>
			</div>
			<div class="col-sm-12">
				<?php foreach ($car->getSpecificationCategories() as $category): ?>
					<div class="trim-specs columns-left small-12">
						<h3 class="subtitle"><?php echo $category->getName(); ?></h3>
						<ul>
							<?php foreach ($category->getSubCategories() as $subcategory): ?>
							<li class="sub-header"><?php echo $subcategory->getName(); ?></li>
							
							<?php foreach ($subcategory->getSpecifications() as $specification): ?>
							<li><?php echo $specification->getName(); ?> <?php echo $specification->getValue(); ?></li>
							<?php endforeach; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div id="servicing" class="col-sm-12 section_review_section">
			<div class="row_review_section">
				<div class="review_section">
					<h2 class="title">Servicing</h2>
					<p></p>
				</div>
			</div>
			<div class="col-sm-12">
				<?php echo $car->getServicing(); ?>
			</div>
		</div>

	</div>
</body>
</html>