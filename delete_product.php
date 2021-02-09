<?php
require 'functions.php';

$id = $_GET["id"];

if (deleteProduct($id) > 0) {
    echo "
            <script>
                alert('Product Deleted!');
                document.location.href = 'product.php'
            </script>
        ";
} else {
    echo "
            <script>
                alert('Delete Fail!');
                document.location.href = 'product.php'
            </script>
        ";
}
