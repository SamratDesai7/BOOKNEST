<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
?>

<?php include('include/header.php'); ?>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-info-circle"></i> View Book Details
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>ISBN</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_query = mysqli_query($conn, "SELECT * FROM tbl_book");
                        $sn = 1;
                        while ($row = mysqli_fetch_array($select_query)) {
                        ?>
                            <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['isbnno']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['publisher']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['place']; ?></td>
                                <td>
                                    <span class="badge <?php echo $row['availability'] == 1 ? 'badge-success' : 'badge-danger'; ?>">
                                        <?php echo $row['availability'] == 1 ? 'Available' : 'Not Available'; ?>
                                    </span>
                                </td>
                                <td>
                                <a href="edit-book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"style="height:25px;width:50px;">
         Edit
    </a>
    <a href="view-book.php?ids=<?php echo $row['id']; ?>" 
        onclick="return confirmDelete('<?php echo $row['book_name']; ?>')" 
        class="btn btn-sm btn-danger" style="height:25px;width:70px;">
       Delete
    </a>
                                </td>
                            </tr>
                        <?php 
                            $sn++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include('include/footer.php'); ?>

<script>
function confirmDelete(bookName) {
    return confirm('Are you sure you want to delete the book: "' + bookName + '"?');
}
</script>