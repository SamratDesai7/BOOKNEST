<?php
session_start();
include('../connection.php');

$name = $_SESSION['name'];
$id = $_SESSION['id'];

if (empty($id)) {
    header("Location: index.php");
}

if (isset($_POST['sbt-book-btn'])) {
    $book_name = $_POST['book_name'];
    $category_name = $_POST['category_name'];
    $isbn = $_POST['isbn'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location_name = $_POST['location_name'];
    $availability = $_POST['availability'];

    $insert_book = mysqli_query($conn, "INSERT INTO tbl_book 
        (book_name, category, isbnno, author, publisher, price, quantity, place, availability) 
        VALUES ('$book_name', '$category_name', '$isbn', '$author_name', '$publisher_name', '$price', '$quantity', '$location_name', '$availability')");

    if ($insert_book) {
        echo "<script>alert('Book added successfully.');</script>";
    }
}
?>

<?php include('include/header.php'); ?>

<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 600px; width: 100%;">
        <div class="card-header bg-primary text-white text-center">
            <i class="fa fa-info-circle"></i> Add Book
        </div>

        <div class="card-body">
            <form method="post">
                <div class="row">
                    <!-- Book Name -->
                    <div class="col-6">
                        <label>Book Name <span class="text-danger">*</span></label>
                        <input type="text" name="book_name" class="form-control form-control-sm" required>
                    </div>

                    <!-- Category -->
                    <div class="col-6">
                        <label>Category <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" name="category_name" required>
                            <option value="">Select</option>
                            <?php 
                                $fetch_category = mysqli_query($conn, "SELECT * FROM tbl_category WHERE status=1");
                                while ($row = mysqli_fetch_array($fetch_category)) {
                                    echo "<option>{$row['category_name']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- ISBN -->
                    <div class="col-6 mt-2">
                        <label>ISBN <span class="text-danger">*</span></label>
                        <input type="text" name="isbn" class="form-control form-control-sm" required>
                    </div>

                    <!-- Author -->
                    <div class="col-6 mt-2">
                        <label>Author <span class="text-danger">*</span></label>
                        <input type="text" name="author_name" class="form-control form-control-sm" required>
                    </div>

                    <!-- Publisher -->
                    <div class="col-6 mt-2">
                        <label>Publisher <span class="text-danger">*</span></label>
                        <input type="text" name="publisher_name" class="form-control form-control-sm" required>
                    </div>

                    <!-- Price -->
                    <div class="col-6 mt-2">
                        <label>Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control form-control-sm" required>
                    </div>

                    <!-- Quantity -->
                    <div class="col-6 mt-2">
                        <label>Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="quantity" class="form-control form-control-sm" required>
                    </div>

                    <!-- Location -->
                    <div class="col-6 mt-2">
                        <label>Location <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" name="location_name" required>
                            <option value="">Select</option>
                            <?php 
                                $fetch_location = mysqli_query($conn, "SELECT * FROM tbl_location WHERE status=1");
                                while ($row = mysqli_fetch_array($fetch_location)) {
                                    echo "<option>{$row['name']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Availability -->
                    <div class="col-12 mt-2">
                        <label>Availability <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" name="availability" required>
                            <option value="">Select</option>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-center mt-3">
                        <button type="submit" name="sbt-book-btn" class="btn btn-primary btn" style="width:30rem;">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>