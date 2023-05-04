<?
$sortTypes = array('id', 'title', 'email', 'status');
?>
<div class="top mb-3 gap-3 d-flex justify-content-between">
  <a href="/">Back to main page</a>
  <a href="/admin/logout"> Logout</a>
</div>
<h1 class="mb-3">Todo List Admin</h1>

<p>Total tasks: <?= $data['total']; ?></p>

<? include __DIR__ . '/../parts/toolbar.tpl.php'; ?>

<ul class="list-group mb-3">
  <?php foreach ($data['tasks'] as $task) { ?>
    <li class="task list-group-item <?= $task['status'] == 1 ? 'completed text-bg-light' : '' ?>">
      <div class="task__top d-flex justify-content-between gap-3">
        <div class="task-status">
          <?= $task['status'] == 1 ? '<span class="badge bg-success">Done</span>' : '<span class="badge bg-danger">Not done</span>' ?>
          <?= $task['edited'] == 1 ? '<span class="badge text-bg-info">Edited by Admin</span>' : '' ?>
        </div>
        <a class="btn btn-sm btn-secondary" href="/admin/task/<?= $task['id'] ?>">Edit</a>
      </div>
      <div class="task__title lead">
        <?= $task['title'] ?>
      </div>
      <div class="task__meta d-flex gap-2  small">
        <span class="task__name"><?= $task['name'] ?></span>
        <span class="task__email text-muted"><?= $task['email'] ?></span>
      </div>
    </li>
  <?php } ?>
</ul>

<? include __DIR__ . '/../parts/pagination.tpl.php'; ?>