<a class="d-inline-block mb-3" href="/admin">Back to task list</a>
<div class="card mb-4">
  <div class="card-body">
    <h5 class="card-title mb-3">Edit task</h5>
    <? if (isset($data['success']) && $data['success'] == 1) { ?>
      <div class="alert alert-success" role="alert">
        Task edited successfully
      </div>
    <? } ?>
    <form action="/admin/edit" method="post">
      <div class="mb-3"><textarea class="form-control" type="text" name="title" id="title" placeholder="Task title"><?= $data['task']['title'] ?></textarea></div>
      <div class="mb-3">
        Task completed: <input type="checkbox" name="status" id="" value="1" <?= ($data['task']['status'] == 1 ? 'checked' : '') ?>>
      </div>
      <div class="mb-3 d-flex gap-2 small">
        <span class="task__name"><?= $data['task']['name'] ?></span>
        <span class="task__email text-muted"><?= $data['task']['email'] ?></span>
      </div>
      <input type="hidden" name="id" value="<?= $data['id'] ?>">
      <button class="btn btn-primary" type="submit">Save</button>
    </form>
  </div>
</div>