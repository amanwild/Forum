<body>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog  mx-auto" style="max-width: 50%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <input type="hidden" class="Category" id="Category" name="Category">
                        <script>
                            Category.value = true;
                        </script>
                        <div class="form-group px-5 py-2">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title:</label>
                                <input type="text" class=" form-control title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea type="text" class="form-control " name="description"> </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>