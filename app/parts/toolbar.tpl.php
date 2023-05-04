<div class="toolbar d-flex justify-content-between mb-3">

  <? include __DIR__ . '/pagination.tpl.php'; ?>

  <div class="sort">
    <form class="d-flex gap-2 mb-0" action="" method="get">

      <button type="submit" name="direction" id="direction" value="<?= ($data['direction'] == 'ASC' ? 'DESC' : 'ASC') ?>" class="btn btn-outline-primary"><?= $data['direction'] == 'ASC' ? 'Ascending' : 'Descending'   ?></button>
      <div class=" btn-group" role="group">
        <? foreach ($sortTypes as $sortType) { ?>
          <button type="submit" name="sort" id="" value="<?= $sortType ?>" class="btn btn-outline-primary <?= ($data['sort'] == $sortType ? 'active' : '') ?>"><?= ucfirst($sortType) ?></button>
        <? } ?>
      </div>
    </form>
  </div>
</div>