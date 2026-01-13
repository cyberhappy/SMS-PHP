    <div class="card text-light bg-dark rounded-3 mt-1 shadow me-1 ms-1 position-relative z-3">

        <div class="form-check form-switch">
            <input
                class="form-check-input"
                type="checkbox"
                id="flexSwitchCheckChecked"
                checked
                onclick="myFunction()"
            />
            <div class="float-end me-5">
                <form action="<?= $searchAction ?>" method="GET">
            <input type="text" name="searchBox" class="form-control rounded-pill bg-light mt-2" placeholder="Search Here" data-bs-theme="light">
                </form>    
        </div>
            <h1 class="text-center ms-5">Welcome PHP WebApp</h1>
        </div>
    </div>