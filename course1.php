<!DOCTYPE html>
<html lang="en" ng-app="CoursPresso">

<head>
	<title>CoursPresso-A course comparison website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>

	<script>
		var app = angular.module('CoursPresso', []);

		app.controller('courseController', function ($scope, $http) {
			$scope.sortBy = '';
			$scope.filterBy = '';


			$scope.setSortBy = function (sortOption) {
				$scope.sortBy = sortOption;
			};

			$scope.setFilterBy = function (filterOption) {
				$scope.filterBy = filterOption;
			};

			// Function to set the institute filter
			$scope.setInstituteFilter = function (institute) {
				$scope.instituteFilter = institute;
			};
		});
	</script>

</head>

<body ng-controller="courseController">
	<div>

		<?php
		if (isset($_GET['category'])) {
			$selectedCategory = $_GET['category'];
			// echo "Selected Category: " . $selectedCategory;
			$sql = "SELECT * FROM `coursedata` WHERE category = '$selectedCategory'";
		} else {
			$sql = "SELECT * FROM `coursedata`";
		}



		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "vatsal";
		try {
			$conn = mysqli_connect($servername, $username, $password, $database);
			error_log("Connection established");
		} catch (Exception $e) {
			error_log("Error connecting to database: " . $e->$getMessage);
		}
		try {

			$result = mysqli_query($conn, $sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					if ($row['type'] != 'Free course')
						$row['type'] = 'See Plans';
					if ($row['rating'] == '0')
						$row['rating'] = null;
					elseif (is_numeric($row['rating']) && intval($row['rating']) == $row['rating'])
						$row['rating'] = $row['rating'] . " Lessons";
					else
						$row['rating'] = "Rating: " . $row['rating'] . "/5";
					if ($row['institute'] == "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE2LjIuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHZpZXdCb3g9IjAgMCAxMTU1IDE2NCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLW1pdGVybGltaXQ9IjIiPjxwYXRoIGQ9Ik0xNTkuNzUgODEuNTRjMC00NC40OSAzNi42My04MC40NyA4Mi40My04MC40NyA0Ni4xMiAwIDgyLjc2IDM2IDgyLjc2IDgwLjQ3IDAgNDQuMTYtMzYuNjQgODAuOC04Mi43NiA4MC44LTQ1LjggMC04Mi40My0zNi42OC04Mi40My04MC44em0xMjUuNjEgMGMwLTIyLjI0LTE5LjMtNDEuODctNDMuMTgtNDEuODctMjMuNTUgMC00Mi44NSAxOS42My00Mi44NSA0MS44NyAwIDIyLjU3IDE5LjMgNDIuMiA0Mi44NSA0Mi4yIDIzLjkyIDAgNDMuMTgtMTkuNjMgNDMuMTgtNDIuMnptNzA1LjYzIDEuMzFjMC00OC43NCAzOS41OC04MS43OCA3NS41Ny04MS43OCAyNC41MyAwIDM4LjYgNy41MiA0OC4wOCAyMS45MmwzLjc3LTE5aDM2Ljc5djE1NS40aC0zNi43OWwtNC43NS0xNmMtMTAuNzkgMTEuNzgtMjQuMjEgMTktNDcuMSAxOS0zNS4zMy0uMDUtNzUuNTctMzEuMTMtNzUuNTctNzkuNTR6bTEyNS42MS0uMzNjLS4wOS0yMy41MjctMTkuNDctNDIuODM1LTQzLTQyLjgzNS0yMy41OSAwLTQzIDE5LjQxMS00MyA0M3YuMTY1YzAgMjEuNTkgMTkuMyA0MC44OSA0Mi44NiA0MC44OSAyMy44NSAwIDQzLjE0LTE5LjMgNDMuMTQtNDEuMjJ6TTk0NS43OCAyMlY0aC00MC4yM3YxNTUuMzloNDAuMjNWNzUuNjZjMC0yNS4xOSAxMi40NC0zOC4yNyAzNC0zOC4yNyAxLjQzIDAgMi43OS4xIDQuMTIuMjNMOTkxLjM2LjExYy0yMC45Ny4xMS0zNi4xNyA3LjMtNDUuNTggMjEuODl6bS00MDQuMjcuMDF2LTE4bC00MC4yMy4wOS4zNCAxNTUuMzcgNDAuMjMtLjA5LS4yMi04My43MmMtLjA2LTI1LjE4IDEyLjM1LTM4LjI5IDMzLjkzLTM4LjM0IDEuMzc2LjAwNCAyLjc1Mi4wODEgNC4xMi4yM0w1ODcuMSAwYy0yMSAuMTctMzYuMjIgNy4zOS00NS41OSAyMi4wMXpNMzM4Ljg4IDk5LjJWNC4wMWg0MC4yMlY5NC4zYzAgMTkuOTUgMTEuMTIgMzEuNzMgMzAuNDIgMzEuNzMgMjEuNTkgMCAzNC0xMy4wOSAzNC0zOC4yOFY0LjAxaDQwLjI0djE1NS4zOGgtNDAuMjF2LTE4Yy05LjQ4IDE0LjcyLTI0Ljg2IDIxLjkyLTQ2LjEyIDIxLjkyLTM1Ljk4LjAxLTU4LjU1LTI2LjE2LTU4LjU1LTY0LjExem0zOTEuNzQtMTcuNDhjLjA5LTQzLjUxIDMxLjIzLTgwLjc0IDgwLjYyLTgwLjY1IDQ1LjguMDkgNzguMTEgMzYuNzggNzggODAgLjAxIDQuMjczLS4zMyA4LjU0LTEgMTIuNzZsLTExOC40MS0uMjJjNC41NCAxOC42NSAxOS44OSAzMi4wOSA0My4xMiAzMi4xNCAxNC4wNiAwIDI5LjEyLTUuMTggMzguMy0xNi45NGwyNy40NCAyMmMtMTQuMTEgMTkuOTMtMzkgMzEuNjYtNjUuNDggMzEuNjEtNDYuNzUtLjE2LTgyLjY3LTM1LjIzLTgyLjU5LTgwLjd6bTExOC4xMi0xNi4xNGMtMi4yNi0xNS43LTE4LjU5LTI3Ljg0LTM3Ljg5LTI3Ljg3LTE4LjY1IDAtMzMuNzEgMTEuMDYtMzkuNjMgMjcuNzNsNzcuNTIuMTR6bS0yNjEuNCA1OS45NGwzNS43Ni0xOC43MmM1LjkxIDEyLjgxIDE3LjczIDIwLjM2IDM0LjQ4IDIwLjM2IDE1LjQzIDAgMjEuMzQtNC45MiAyMS4zNC0xMS44MiAwLTI1LTg0LjcxLTkuODUtODQuNzEtNjcgMC0zMS41MiAyNy41OC00OC4yNiA2MS43Mi00OC4yNiAyNS45NCAwIDQ4LjkyIDExLjQ5IDYxLjQgMzIuODNsLTM1LjQ0IDE4Ljc1Yy01LjI1LTEwLjUxLTE1LjEtMTYuNDItMjcuNTgtMTYuNDItMTIuMTQgMC0xOC4wNiA0LjI3LTE4LjA2IDExLjQ5IDAgMjQuMyA4NC43MSA4Ljg3IDg0LjcxIDY3IDAgMzAuMjEtMjQuNjIgNDguNTktNjQuMzUgNDguNTktMzMuODItLjAzLTU3LjQ2LTExLjE5LTY5LjI3LTM2Ljh6TTAgODEuNTRDMCAzNi43MyAzNi42My43NCA4Mi40My43NGMyNy45NDctLjE5NiA1NC4xODIgMTMuNzM3IDY5LjY3IDM3bC0zNC4zNCAxOS45MmE0Mi45NzIgNDIuOTcyIDAgMDAtMzUuMzMtMTguMzJjLTIzLjU1IDAtNDIuODUgMTkuNjMtNDIuODUgNDIuMiAwIDIyLjU3IDE5LjMgNDIuMiA0Mi44NSA0Mi4yYTQyLjUwMiA0Mi41MDIgMCAwMDM2LjMxLTIwbDM0IDIwLjI4Yy0xNS4zMDcgMjMuOTU1LTQxLjkwMiAzOC40MzEtNzAuMzMgMzguMjhDMzYuNjMgMTYyLjM0IDAgMTI1LjY2IDAgODEuNTR6IiBmaWxsPSIjMDA1NkQyIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48L3N2Zz4=")
						$row['institute'] = "img/coursera-logo.svg";
					if ($row['institute'] == "img/coursera-logo.svg")
						$row['institute_name'] = "Coursera";
					else
						$row['institute_name'] = "Codecademy";
					$row['other_details'] = str_replace('Â', '', $row['other_details']);
					$rows[] = $row;
				}


				shuffle($rows);
				$json_courses = json_encode($rows);
				echo "<script>var courseData = $json_courses</script>";
				$conn->close();

			}
		} catch (Exception $e) {
		}
		?>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php"><span>Cours</span>Presso</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
					<li class="nav-item active"><a href="course.php" class="nav-link">Course</a></li>
					<!-- <li class="nav-item"><a href="instructor.html" class="nav-link">Instructor</a></li> -->
					<!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
					<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
									class="fa fa-chevron-right"></i></a></span> <span>Course Lists <i
								class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Course Lists</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 sidebar">
					<div class="sidebar-box bg-white ftco-animate">
						<form action="#" class="search-form">
							<div class="form-group">
								<span class="icon fa fa-search"></span>
								<input type="text" ng-model="filterBy" placeholder="Search...">
							</div>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Course Category</h3>
						<form action="#" class="browse-form">
							<label for="option-category-1"><input type="checkbox" id="option-category-1" name="vehicle"
									value="" checked> Design &amp; Illustration</label><br>
							<label for="option-category-2"><input type="checkbox" id="option-category-2" name="vehicle"
									value=""> Web Development</label><br>
							<label for="option-category-3"><input type="checkbox" id="option-category-3" name="vehicle"
									value=""> Programming</label><br>
							<label for="option-category-4"><input type="checkbox" id="option-category-4" name="vehicle"
									value=""> Music &amp; Entertainment</label><br>
							<label for="option-category-5"><input type="checkbox" id="option-category-5" name="vehicle"
									value=""> Photography</label><br>
							<label for="option-category-6"><input type="checkbox" id="option-category-6" name="vehicle"
									value=""> Health &amp; Fitness</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Filter by Institute:</h3>

						<div>
							<input type="radio" name="instituteFilter" ng-model="instituteFilter" ng-value="" checked>
							All</input><br>
							<input type="radio" name="instituteFilter" ng-model="instituteFilter" ng-value="Coursera">
							Coursera</input><br>
							<input type="radio" name="instituteFilter" ng-model="instituteFilter" ng-value="Codecademy">
							Codecademy</input><br>
							<!-- <input type="radio" name="instituteFilter" ng-model="instituteFilter"
								ng-value="course.institute_name" ng-repeat="course in courses | unique:'institute'"
								ng-change="setInstituteFilter(instituteFilter)">{{course.institute_name }}</input> -->
						</div>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Course Instructor</h3>
						<form action="#" class="browse-form">
							<label for="option-instructor-1"><input type="radio" id =""name="instituteFilter" ng-model="instituteFilter" ng-value="" checked>
							All</input><br>
							<label for="option-instructor-2"><input type="checkbox" id="option-instructor-2"
									name="vehicle" value=""> John Dee</label><br>
							<label for="option-instructor-3"><input type="checkbox" id="option-instructor-3"
									name="vehicle" value=""> Nathan Messy</label><br>
							<label for="option-instructor-4"><input type="checkbox" id="option-instructor-4"
									name="vehicle" value=""> Tony Griffin</label><br>
							<label for="option-instructor-5"><input type="checkbox" id="option-instructor-5"
									name="vehicle" value=""> Ben Howard</label><br>
							<label for="option-instructor-6"><input type="checkbox" id="option-instructor-6"
									name="vehicle" value=""> Harry Potter</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Course Type</h3>
						<form action="#" class="browse-form">
							<label for="option-course-type-1"><input type="checkbox" id="option-course-type-1"
									name="vehicle" value="" checked> Basic</label><br>
							<label for="option-course-type-2"><input type="checkbox" id="option-course-type-2"
									name="vehicle" value=""> Intermediate</label><br>
							<label for="option-course-type-3"><input type="checkbox" id="option-course-type-3"
									name="vehicle" value=""> Advanced</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Software</h3>
						<form action="#" class="browse-form">
							<label for="option-software-1"><input type="checkbox" id="option-software-1" name="vehicle"
									value="" checked> Adobe Photoshop</label><br>
							<label for="option-software-2"><input type="checkbox" id="option-software-2" name="vehicle"
									value=""> Adobe Illustrator</label><br>
							<label for="option-software-3"><input type="checkbox" id="option-software-3" name="vehicle"
									value=""> Sketch</label><br>
							<label for="option-software-4"><input type="checkbox" id="option-software-4" name="vehicle"
									value=""> WordPress</label><br>
							<label for="option-software-5"><input type="checkbox" id="option-software-5" name="vehicle"
									value=""> HTML &amp; CSS</label><br>
						</form>
					</div>
				</div>
				<style>
					.img {
						background-size: contain;
						background-position: center;
						background-repeat: no-repeat;
						width: 300px;
						height: 200px;
					}
				</style>
				<script>
					app.controller('courseController', function ($scope) {
						$scope.courses = courseData;
						// $scope.courses = $scope.courses.slice(0, );

					});
				</script>
				<div class="col-lg-9">
					<div class="row">
						<div ng-repeat="course in courses | orderBy:sortBy | filter:filterBy | filter:instituteFilter"
							class="col-md-6 d-flex align-items-stretch ftco-animate">
							
								<div class="project-wrap">
									<a href="{{course.name_url}}" class="img"
										style="background-image: url({{course.institute}});">
										<span class="price">{{course.type}}</span>
									</a>
									<div class="text p-4">

										<h3><a href="{{course.name_url}}">{{course.name}}</a></h3>
										<p class="rating"><a href="{{course.name_url}}">{{course.institute_name}}</a>
										</p>
										<p class="description">><span>{{course.skills}}</span></p>
										<p class="instructors">{{course.other_details}}</p>
										<p class="rating">{{course.rating}}</p>

									</div>
								</div>
						</div>
						<!-- <div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url(images/course-image.jpg);">
									<span class="price">Coursera</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Introduction to Artificial Intelligence</a></h3>
									<p class="institute">Institute: <span>Carnegie Mellon University</span></p>
									<p class="description">This course provides an introduction to the fundamental
										concepts and ideas underlying artificial intelligence. Topics include: problem
										solving and search, game playing, knowledge representation and reasoning,
										uncertainty, machine learning, natural language processing, vision, and
										robotics.</p>
									<p class="instructors">Instructors: <span>Dr. Manuela Veloso and Dr. Sebastian
											Thrun</span></p>
									<p class="rating">Rating: <span>4.8/5</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>12000</li>
										<li class="price">$99</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url(images/work-1.jpg);">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url(images/work-2.jpg);">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url(images/work-3.jpg);">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url(images/work-4.jpg);">
									<span class="price">Coursera</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url(images/work-5.jpg);">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img"
									style="background-image: url(https://companieslogo.com/img/orig/COUR_BIG-e3284ace.png);">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
					</div> -->
						<div class="row mt-5">
							<div class="col">
								<div class="block-27">
									<ul>
										<li><a href="#">&lt;</a></li>
										<li class="active"><span>1</span></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&gt;</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
	</section>

	<footer class="ftco-footer ftco-no-pt">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md pt-5">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2"> Cours Presso About</h2>
						<p>CoursePress is a comprehensive course comparison website designed to assist students in
							making informed decisions about their educational journey. </p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md pt-5">
					<div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Help Desk</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Customer Care</a></li>
							<li><a href="#" class="py-2 d-block">Legal Help</a></li>
							<li><a href="#" class="py-2 d-block">Services</a></li>
							<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
							<li><a href="#" class="py-2 d-block">Refund Policy</a></li>
							<li><a href="#" class="py-2 d-block">Call Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md pt-5">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2">Recent Courses</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Web Development</a></li>
							<li><a href="#" class="py-2 d-block">Android Development</a></li>
							<li><a href="#" class="py-2 d-block">Algorithms</a></li>
							<li><a href="#" class="py-2 d-block">Data Science</a></li>
							<li><a href="#" class="py-2 d-block">AI & ML</a></li>
							<li><a href="#" class="py-2 d-block">IOT </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md pt-5">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map-marker"></span><span class="text">SVIT , Rajupura
										Village, Vasad, Anand,</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text"> 02692 274
											766</span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane"></span><span
											class="text">coursepresso@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved | This template
						is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
							target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>


</body>

</html>