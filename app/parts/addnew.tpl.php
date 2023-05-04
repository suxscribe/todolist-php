<div class="card mb-4">
  <div class="card-body">
    <h5 class="card-title mb-3">Add new task</h5>
    <form action="/task/add" method="post">
      <div class="mb-3">
        <textarea class="form-control" type="text" name="title" id="title" placeholder="Task title" required></textarea>
      </div>
      <div class="mb-3 d-flex gap-3">
        <input class="form-control" type="text" name="name" id="name" placeholder="User Name" required />
        <input class="form-control" type="email" name="email" id="email" placeholder="Email address" required />
      </div>
      <button class="btn btn-primary" type="submit">Add</button>
    </form>
  </div>
</div>