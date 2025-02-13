<?php
session_start();
include ('../connection.php');
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if(empty($id))
{
    header("Location: index.php"); 
}
$id = $_GET['id'];
$fetch_query = mysqli_query($conn, "select * from tbl_book where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['save-book-btn']))
{
   
	$book_name = $_POST['book_name'];
    $category_name = $_POST['category_name'];
    $isbn = $_POST['isbn'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location_name = $_POST['location_name'];
    $availability = $_POST['availability'];
            
    $update_book = mysqli_query($conn,"update tbl_book set book_name='$book_name', category='$category_name', isbnno='$isbn', author='$author_name', publisher='$publisher_name', price='$price', quantity='$quantity', place='$location_name',  availability='$availability' where id='$id'");

    if($update_book > 0)
    {
?>
<script type="text/javascript">
    alert("Book updated successfully.");
    window.location.href='view-book.php';
</script>
<?php
}
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Edit Book</a>
                </li>
            </ol>

            <div class="card mb-2"> <!-- Reduced margin-bottom -->
                <div class="card-header p-2"> <!-- Reduced padding -->
                    <i class="fa fa-info-circle"></i> Edit Details
                </div>

                <form method="post" class="form-valide">
                    <div class="card-body p-3"> <!-- Reduced padding -->
                        <div class="col-md-10 mx-auto"> <!-- Reduced width -->

                            <!-- Book Name -->
                            <div class="form-group mb-2">
                                <label for="book_name">Book Name <span class="text-danger">*</span></label>
                                <input type="text" name="book_name" id="book_name" class="form-control form-control-sm" placeholder="Enter Book Name" required value="<?php echo $row['book_name']; ?>">
                            </div>

                            <!-- Category -->
                            <div class="form-group mb-2">
                                <label for="category_name">Category <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" id="category_name" name="category_name" required>
                                    <option value="">Select Category</option>
                                    <?php 
                                    $fetch_category = mysqli_query($conn, "SELECT * FROM tbl_category WHERE status=1");
                                    while ($rows = mysqli_fetch_array($fetch_category)) { ?>
                                        <option <?php if ($rows['category_name'] == $row['category']) echo 'selected="selected"'; ?>>
                                            <?php echo $rows['category_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- ISBN -->
                            <div class="form-group mb-2">
                                <label for="isbn">ISBN <span class="text-danger">*</span></label>
                                <input type="text" name="isbn" id="isbn" class="form-control form-control-sm" placeholder="Enter ISBN" required value="<?php echo $row['isbnno']; ?>">
                            </div>

                            <!-- Author -->
                            <div class="form-group mb-2">
                                <label for="author_name">Author <span class="text-danger">*</span></label>
                                <input type="text" name="author_name" id="author_name" class="form-control form-control-sm" placeholder="Enter Author Name" required value="<?php echo $row['author']; ?>">
                            </div>

                            <!-- Publisher -->
                            <div class="form-group mb-2">
                                <label for="publisher_name">Publisher <span class="text-danger">*</span></label>
                                <input type="text" name="publisher_name" id="publisher_name" class="form-control form-control-sm" placeholder="Enter Publisher Name" required value="<?php echo $row['publisher']; ?>">
                            </div>

                            <!-- Price -->
                            <div class="form-group mb-2">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input type="text" name="price" id="price" class="form-control form-control-sm" placeholder="Enter Price" required value="<?php echo $row['price']; ?>">
                            </div>

                            <!-- Quantity -->
                            <div class="form-group mb-2">
                                <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                <input type="text" name="quantity" id="quantity" class="form-control form-control-sm" placeholder="Enter Number of Copies" required value="<?php echo $row['quantity']; ?>">
                            </div>

                            <!-- Location -->
                            <div class="form-group mb-2">
                                <label for="location_name">Location <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" id="location_name" name="location_name" required>
                                    <option value="">Select Location</option>
                                    <?php 
                                    $fetch_category = mysqli_query($conn, "SELECT * FROM tbl_location WHERE status=1");
                                    while ($rows = mysqli_fetch_array($fetch_category)) { ?>
                                        <option <?php if ($rows['name'] == $row['place']) echo 'selected="selected"'; ?>>
                                            <?php echo $rows['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Availability -->
                            <div class="form-group mb-3">
                                <label for="availability">Availability <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" id="availability" name="availability" required>
                                    <option value="">Select Status</option>
                                    <option value="1" <?php if ($row['availability'] == 1) echo 'selected="selected"'; ?>>Available</option>
                                    <option value="0" <?php if ($row['availability'] == 0) echo 'selected="selected"'; ?>>Not Available</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" name="save-book-btn" class="btn btn-primary btn-sm px-4" style="width:35rem;">
                                    Save
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('include/footer.php'); ?>
</div>
