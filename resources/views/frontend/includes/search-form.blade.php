<style>
    .search-form {
        background-color: #f8f9fa;
    }
    .search-form button {
        background-color: #f2d49b;
        color: black;
        border: 0px;
    }
</style>
<section class="search-form">
    <div class="container py-5">
        <h5 class="mt-1 mb-2">Search Jewelry</h5>
        <form class="row g-3 align-items-center">
            <div class="col-12 col-md-4">
                <label for="jewelryName" class="visually-hidden">Jewelry Name</label>
                <input type="text" class="form-control" id="jewelryName" placeholder="Enter jewelry name">
            </div>
            <div class="col-12 col-md-4">
                <label for="categorySelect" class="visually-hidden">Select Category</label>
                <select class="form-select" id="categorySelect">
                    <option selected disabled>Select a Jewelry Type</option>
                    <option value="necklaces">Necklaces</option>
                    <option value="bracelets">Bracelets</option>
                    <option value="earrings">Earrings</option>
                    <option value="rings">Rings</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
