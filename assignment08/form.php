<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-5 mb-3">☕ Coffee Order Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	
	<div class="container">

		<form action="submit_form.php" method="POST" class="mt-3">

			<div class="form-group row">
				<label for="fname-id" class="col-sm-3 col-form-label text-sm-right">First Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="fname-id" name="fname" placeholder="Tommy">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="lname-id" class="col-sm-3 col-form-label text-sm-right">Last Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="lname-id" name="lname" placeholder="Trojan">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="phone-id" class="col-sm-3 col-form-label text-sm-right">Phone Number:</label>
				<div class="col-sm-9">
					<input type="phone" class="form-control" id="phone-id" name="phone" placeholder="1231231234">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="phone-id" class="col-sm-3 col-form-label text-sm-right">Confirm Phone Number:</label>
				<div class="col-sm-9">
					<input type="phone" class="form-control" id="phone-id" name="phone-confirm" placeholder="1231231234">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="order-id" class="col-sm-3 col-form-label text-sm-right">What would you like to order?</label>
				<div class="col-sm-9">
					<select name="order" id="order-id" class="form-control">
						<option value="" disabled selected>-- Select One --</option>
						<option value="americano">Americano</option>
						<option value="latte">Latte</option>
						<option value="cappuccino">Cappuccino</option>
						<option value="macchiato">Macchiato</option>
						<option value="decaf">Decaf</option>
					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-sm-right">Size: </label>
				<div class="col-sm-9">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="radio" name="size" class="form-check-input mr-2" value="small">
							Small
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label ml-2">
							<input type="radio" name="size" class="form-check-input mr-2" value="medium">
							Medium
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label ml-2">
							<input type="radio" name="size" class="form-check-input mr-2" value="large">
							Large
						</label>
					</div> <!-- .form-check -->
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-sm-right">Flavor shot(s):</label>
				<div class="col-sm-9">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="checkbox" name="flavor[]" class="form-check-input mr-2" value="vanilla">
							Vanilla
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="checkbox" name="flavor[]" class="form-check-input mr-2" value="caramel">
							Caramel
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="checkbox" name="flavor[]" class="form-check-input mr-2" value="hazelnut">
							Hazelnut
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="checkbox" name="flavor[]" class="form-check-input mr-2" value="pumpkin-spice">
							Pumpkin Spice
						</label>
					</div> <!-- .form-check -->
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->

		</form>
		
	</div> <!-- .container -->

</body>
</html>