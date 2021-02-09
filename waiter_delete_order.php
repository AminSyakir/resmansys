<?php
require 'functions.php';

$id = $_GET["id"];

if (deleteOrder($id) > 0) {
    echo "
            <script>
                alert('Order Deleted!');
                document.location.href = 'waiter_order.php'
            </script>
        ";
} else {
    echo "
            <script>
                alert('Delete Fail!');
                document.location.href = 'waiter_order.php'
            </script>
        ";
}
