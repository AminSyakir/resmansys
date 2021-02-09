<?php
require 'functions.php';

$id = $_GET["id"];

if (deleteEmployee($id) > 0) {
    echo "
            <script>
                alert('Employee Deleted!');
                document.location.href = 'employee.php'
            </script>
        ";
} else {
    echo "
            <script>
                alert('Delete Fail!');
                document.location.href = 'employee.php'
            </script>
        ";
}
