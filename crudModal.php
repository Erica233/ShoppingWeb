<!-- Edit product details using Modal -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit your product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="manageProduct.php?id=<?= $row['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="id" class="form-label">Product ID</label>
                        <input type="text" class="form-control" id="id" name="id"
                               value="<?= htmlentities($row['id']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= htmlentities($row['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Sale Price</label>
                        <input type="number" class="form-control" id="price" min="0.01" step=".01" name="price"
                               value="<?= htmlentities($row['price']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="quantity" min="1" max="10000" name="quantity"
                               value="<?= htmlentities($row['quantity']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <select class="form-select" id="category" aria-label="Default select example"
                                name="category" required>
                            <option value="" disabled>Select Product Category</option>
                            <option value="Food" <?php if (htmlentities($row['category']) === 'Food') echo 'selected'; ?>>
                                Food
                            </option>
                            <option value="Clothes" <?php if (htmlentities($row['category']) === 'Clothes') echo 'selected'; ?>>
                                Clothes
                            </option>
                            <option value="Groceries" <?php if (htmlentities($row['category']) === 'Groceries') echo 'selected'; ?>>
                                Groceries
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <div class="input-group" id="description">
                            <textarea class="form-control" aria-label="With textarea" name="description"
                                      required><?= htmlentities($row['description']) ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrfToken'] ?>">
                    <button type="submit" class="btn btn-primary" name="editProduct" value="Edit Product">Edit Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete product details using Modal -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete your product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="manageProduct.php?id=<?= $row['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="id" class="form-label">Product ID</label>
                        <input type="text" class="form-control" id="id" name="id"
                               value="<?= htmlentities($row['id']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= htmlentities($row['name']) ?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Sale Price</label>
                        <input type="number" class="form-control" id="price" min="0.01" step=".01" name="price"
                               value="<?= htmlentities($row['price']) ?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="quantity" min="1" max="10000" name="quantity"
                               value="<?= htmlentities($row['quantity']) ?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <select class="form-select" id="category" aria-label="Default select example"
                                name="category" required disabled>
                            <option value="" disabled>Select Product Category</option>
                            <option value="Food" <?php if (htmlentities($row['category']) === 'Food') echo 'selected'; ?>>
                                Food
                            </option>
                            <option value="Clothes" <?php if (htmlentities($row['category']) === 'Clothes') echo 'selected'; ?>>
                                Clothes
                            </option>
                            <option value="Groceries" <?php if (htmlentities($row['category']) === 'Groceries') echo 'selected'; ?>>
                                Groceries
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <div class="input-group" id="description">
                            <textarea class="form-control" aria-label="With textarea" name="description" required
                                      disabled><?= htmlentities($row['description']) ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrfToken'] ?>">
                    <button type="submit" class="btn btn-danger" name="deleteProduct" value="Delete Product">Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Buy product using Modal -->
<div class="modal fade" id="buy_<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Buy this product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
            </div>
            <form method="post" action="buyProduct.php?id=<?= $row['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="id" class="form-label">Product ID</label>
                        <input type="text" class="form-control" id="id" name="id"
                               value="<?= htmlentities($row['id']) ?>" required>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= htmlentities($row['name']) ?>" required>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="price" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="price" name="price" step=".01"
                               value="<?php echo htmlentities($row['price']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="price" name="price" step=".01"
                               value="<?php echo htmlentities($row['price']); ?>" required disabled>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="quantity" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                               value="<?= htmlentities($row['quantity']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="totalQuantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="totalQuantity" min="1"
                               max="<?= htmlentities($row['quantity']) ?>" name="totalQuantity"
                               value="1" required>
                        <script>
                            $('#totalQuantity').change(function () {
                                var quantity = $('#totalQuantity').val();
                                var unitPrice = $('#price').val();
                                var totalPrice = (unitPrice * quantity).toFixed(2);
                                $('#totalPrice').val(totalPrice);
                            });
                        </script>
                    </div>
                    <div class="mb-3">
                        <label for="totalPrice" class="form-label">Total Cost</label>
                        <input type="number" class="form-control" id="totalPrice" name="totalPrice" min="0.01"
                               step=".01" value="<?= htmlentities($row['price']) ?>" required disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrfToken'] ?>">
                    <button type="submit" class="btn btn-danger" name="buyProduct" value="Buy Product">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
