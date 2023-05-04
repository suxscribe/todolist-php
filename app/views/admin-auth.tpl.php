<div class="d-flex flex-column align-items-center ">
  <h1 class="mb-3">Login</h1>
  <div class="col-sm-6 col-md-5 ">

    <div class="card mb-4">
      <div class="card-body">
        <? if (isset($data['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?= $data['error'] ?>
          </div>

        <? } ?>
        <form action="/admin/login" method="post">
          <div class="mb-3">
            <input type="login" class="form-control" id="login" name="login" placeholder="Login" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <button class="btn btn-primary" type="submit">Login</button>
        </form>
      </div>
    </div>
    <a href="/">Back to main page</a>
  </div>
</div>