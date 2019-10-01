<div class="container">
  <div class="row">
    <div class="col-sm">
        <!-- Default form login -->
        <form class="text-center border border-light p-5" method="post" action="<?=site_url()?>login/login_validation">

            <p class="h4 mb-4">Login SIHOTUMP</p>

            <!-- Email -->
            <input type="text" name="username" id="username" class="form-control mb-4" placeholder="Username">

            <!-- Password -->
            <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Password">


            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit">Login</button>

        </form>
        <!-- Default form login -->
    </div>
  </div>
</div>