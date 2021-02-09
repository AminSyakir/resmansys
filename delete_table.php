<?php
require 'functions.php';

$id = $_GET["id"];

if (deleteTable($id) > 0) {
    echo "
            <script>
                alert('Table Deleted!');
                document.location.href = 'table.php'
            </script>
        ";
} else {
    echo "
            <script>
                alert('Delete Fail!');
                document.location.href = 'table.php'
            </script>
        ";
}
