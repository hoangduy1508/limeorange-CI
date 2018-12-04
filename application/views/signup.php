 <?php $this->load->view('header'); ?>
    <div class="container">

        <div class="col-sm-6 col-sm-offset-3">

            <h1><span class="fa fa-sign-in"></span> Signup</h1>

            <!-- show any messages that come back with authentication -->
            <% if(messages.length >0){ %>
                <div class="tinnhan alert alert-danger">
                    <%= messages %>
                </div>
                <% } %>

                    <!-- LOGIN FORM -->
                    <form action="/signup" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="repassword">
                        </div>

                        <button type="submit" class="btn btn-warning btn-lg">Signup</button>
                    </form>

                    <hr>

                    <p>Already have an account? <a href="/login">Login</a></p>
                    <p>Or go <a href="/">home</a>.</p>

        </div>

    </div>
   <?php $this->load->view('footer'); ?>