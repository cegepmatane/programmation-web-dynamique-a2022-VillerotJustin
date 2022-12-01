<div class="row justify-content-center">
    <div class="col-10">
        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
                <form method="post" action="member/auth-treatment.php">
                    code : admin admin
                    <!-- Email input -->
                    <div>
                        <input type="text" id="username" name="username" class="form-control" placeholder="username">
                        <label class="form-label" for="username">Email or username</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" placeholder="password">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <!-- Submit button -->
                    <div class="text-center flex-up">
                        <button type="submit" id="auth" name="auth" class="btn btn-primary btn-block mb-4">Log in</button>
                        or
                        <a href="member/create-member.php" class="text-center">
                            Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>