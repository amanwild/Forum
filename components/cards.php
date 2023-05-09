<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Index</title>
</head>


<body>
    <div class="d-flex text-center mt-3">
        <h2 class=" ml-5 my-auto mr-auto d-inline">IDescuss Forum Categories</h2>
        
            <button type="button" class="btn btn-success d-sticky display-right my-1 mr-5" data-toggle="modal" data-target="#addModal" data-whatever="@mdo">Add Category</button>

    </div>

    <div class="mb-5 d-flex flex-row justify-content-center flex-wrap">
        <?php
        $select_query = "SELECT * FROM `categories`";
        $select_result = mysqli_query($connect, $select_query);
        $no_result = true;
        while ($row = mysqli_fetch_assoc($select_result)) {
            $no_result = false;

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            $cat_created = $row['cat_created'];
            $cat_description = $row['cat_description'];
            $cat_user_id = $row['cat_user_id'];

            echo '<div class="card m-3 text-center " id="cat_id_'.$cat_id.'" style="width: 18rem; border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
            <div class="p-2">
                <img src="https://source.unsplash.com/800x600/?' . $cat_title . ',' . $cat_title . '" style="width: 250px; border-radius:8px; " class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title"><a style="text-decoration:none;" href ="./treadlist.php?Cat_id=' . $cat_id . '">' . $cat_title . '</a></h5>
                <p class="card-text">' .substr($cat_description,0,100) . '...</p>
                <a href="./treadlist.php?Cat_id=' . $cat_id . '" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>';
        }
        if ($no_result) {
            echo '<div class="jumbotron jumbotron-fluid m-5 p-3">
        <div class="container">
          <h1 class="display-5">Be the first person to add forum category for descussion</h1>
          <p class="lead">No data found to the related forum.</p>
        </div>
      </div>';
        }

        ?>

    </div>

    <!-- -- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        setTimeout(function() {

            // // // // // // // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    

</body>


</html>