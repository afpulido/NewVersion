    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Login</h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form action="" method="post" class="col-md-9 m-auto" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputuser">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control mt-1" id="password" name="password" placeholder="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Send</button>
                    </div>
                </div>
                <?php echo $message?>
            </form>
        </div>
    </div>
    <!-- End Contact -->