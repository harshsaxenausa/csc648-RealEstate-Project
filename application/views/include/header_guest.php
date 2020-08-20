<div class="navbar-nav ml-auto">
<a href = "/views/listings/new_listing.php" ><button type="button" class="btn btn-outline-light m-1">Post a Listing </button></a>

  <!-- Sign-up btn  -->
  <a href="/views/user/register.php">
        <button type="button" class="btn btn-outline-light m-1">Sign up</button>
    </a>


    <!-- Login -->
    <button type="button" class="btn btn-outline-light m-1" data-toggle="modal"
            data-target="#exampleModalCenter" data-backdrop="false">Login
    </button>
    <!-- Login Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <!-- Login button -->
                <div class="modal-header">
                    <h3 class="modal-title w-100" id="exampleModalLongTitle">Login</h3>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>

                <!-- Login Popup box -->
                <div class="modal-body m-2">
                    <form method="POST" action="/controller/login.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email_login" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group my-5">
                            <label for="exampleInputPassword1">Password</label>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("myInput");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
                            <input type="password" name="password_login" class="form-control" id="exampleInputPassword1"
                                   placeholder="Enter password">
                            <a> <small id="emailHelp" class="form-text text-muted">Forgot
                                    Password?</small><a>

                        </div>
                        <!-- Submit btn -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-dark p-2">Submit</button>
                        </div>

                    </form>
                </div>
                <!-- End of Login Popup box -->

            </div>
        </div>
    </div>
</div>