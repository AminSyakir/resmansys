<?php
$conn = mysqli_connect("localhost", "root", "", "multi_user");


function query($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function addEmployee($data)
{
    global $conn;

    $name = $data["name"];
    $contact_no = $data["contact_no"];
    $address_ = $data["address_"];
    $username = $data["username"];
    $password = $data["password"];
    $level_ = $data["level_"];

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO user
              VALUES
              ('', '$name', '$contact_no', '$address_','$gambar','$username','$password','$level_')           
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // check apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // check apakah yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // check jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function deleteEmployee($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function updateProfile($data)
{
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $contact_no = htmlspecialchars($data["contact_no"]);
    $address_ = htmlspecialchars($data["address_"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    // check apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    // query insert ada
    $query = "UPDATE user SET
              name = '$name',
              contact_no = '$contact_no',
              address_ = '$address_',
              gambar = '$gambar' 
              WHERE id = $id         
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// <-- product -->

function addProduct($data)
{
    global $conn;

    $product_name = $data["product_name"];
    $product_price = $data["product_price"];
    $product_category = $data["product_category"];



    // query insert data
    $query = "INSERT INTO product
              VALUES
              ('', '$product_name', '$product_price', '$product_category')           
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateProduct($data)
{
    global $conn;
    $id = $data["id"];
    $product_name = $data["product_name"];
    $product_price = $data["product_price"];
    $product_category = $data["product_category"];


    // query insert ada
    $query = "UPDATE product SET
              product_name = '$product_name',
              product_price = '$product_price',
              product_category = '$product_category'
              WHERE id = $id         
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteProduct($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM product WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// <-- table -->
function addTable($data)
{
    global $conn;

    $table_name = $data["table_name"];
    $table_capacity = $data["table_capacity"];



    // query insert data
    $query = "INSERT INTO table_list
              VALUES
              ('', '$table_name', '$table_capacity')           
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteTable($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM table_list WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function updateTable($data)
{
    global $conn;
    $id = $data["id"];
    $table_name = $data["table_name"];
    $table_capacity = $data["table_capacity"];

    // query insert ada
    $query = "UPDATE table_list SET
              table_name = '$table_name',
              table_capacity = '$table_capacity'
              WHERE id = $id         
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// <-- order -->
function addOrder($data)
{
    global $conn;

    $product_name = $data["product_name"];
    $order_quantity = $data["order_quantity"];
    $table_name = $data["table_name"];



    // query insert data
    $query = "INSERT INTO order_list
              VALUES
              ('', '$product_name', '$order_quantity', '$table_name', '')           
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteOrder($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM order_list WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function updateBillStatus($data)
{
    global $conn;
    $id = $data["id"];
    $status = $data["status"];

    // query insert ada
    $query = "UPDATE order_list SET
              status = '$status'
              WHERE id = $id         
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
