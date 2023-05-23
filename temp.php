<!DOCTYPE html>
<html ng-app="courseApp">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <style>
        /* Add your CSS styles here */
    </style>
    <script>
        var app = angular.module('courseApp', []);

        app.controller('courseController', function ($scope, $http) {
            $scope.sortBy = ''; // Default sort by course name
            $scope.filterBy = ''; // Default no filter

            
            // Function to set the sorting option
            $scope.setSortBy = function (sortOption) {
                $scope.sortBy = sortOption;
            };

            // Function to set the filtering option
            $scope.setFilterBy = function (filterOption) {
                $scope.filterBy = filterOption;
            };
        });
    </script>
</head>

<body ng-controller="courseController">
    <?php
    // PHP code to fetch data from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "vatsal";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch course details from the database
    $sql = "SELECT * FROM `coursedata`";
    $result = $conn->query($sql);
    echo "SQL DONE";

    // Store the course details in an array
    $courses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
            
        }
        echo ' Course fetched <br>';
    }
    


    // Close the database connection
    $conn->close();

    // Convert the array to JSON
    $json_courses = json_encode($courses);
    echo "<script>var coursesData = $json_courses;</script>";
    ?>
    <div>
        <label>Sort by:</label>
        <select ng-model="sortBy" ng-change="setSortBy(sortBy)">
            <option value="name">Course Name</option>
            <option value="rating">Rating</option>
            <!-- Add more sorting options as needed -->
        </select>
    </div>
    <div>
        <label>Filter by:</label>
        <input type="text" ng-model="filterBy" ng-change="setFilterBy(filterBy)">
    </div>
    <div ng-repeat="course in courses | orderBy:sortBy | filter:filterBy" class="project-wrap">
        <a href="{{course.url}}" class="img" style="background-image: url({course.institute});">
            <span class="price">{{course.institute}}</span>
        </a>
        <div class="text p-4">
            <h3><a href="{{course.name_url}}">{{course.name}}</a></h3>
            <!-- <p class="institute">Institute: <span>{{course.institute}}</span></p> -->
            <p class="description">{{course.skills}}</p>
            <p class="instructors">Instructors: <span>{{course.other_details}}</span></p>
            <p class="rating">Rating: <span>{{course.rating}}</span></p>

        </div>
    </div>
    <script>
        // Assign the fetched data to the AngularJS controller
        app.controller('courseController', function($scope) {
            $scope.courses = coursesData;
        });
    </script>


</body>

</html>