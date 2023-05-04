<?

$sortTypes = array('id', 'title', 'email', 'status');
?>
<div class="top mb-3 d-flex justify-content-end">
  <a href="/admin/login">Login</a>
</div>
<h1 class="mb-3">Todo List</h1>

<? include __DIR__ . '/../parts/addnew.tpl.php'; ?>

<p>Total tasks: <?= $data['total']; ?></p>

<? include __DIR__ . '/../parts/toolbar.tpl.php'; ?>

<ul class="list-group mb-3">
  <?php foreach ($data['tasks'] as $task) { ?>
    <li class="task list-group-item <?= $task['status'] == 1 ? 'completed text-bg-light' : '' ?>">
      <div class="task-status">
        <?= $task['status'] == 1 ? '<span class="badge bg-success">Done</span>' : '<span class="badge bg-danger">Not done</span>' ?>
        <?= $task['edited'] == 1 ? '<span class="badge text-bg-info">Edited by Admin</span>' : '' ?>
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