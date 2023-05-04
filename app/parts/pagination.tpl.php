<?
if ($data['totalPages'] > 1) {
  echo '<nav>
  <ul class="pagination mb-0">';
  for ($i = 1; $i <= $data['totalPages']; $i++) {
    $href = ($i != $data['page'] ? 'href="?page=' . $i . '"' : '');
    echo '<li class="page-item"><a class="page-link' . ($i == $data['page'] ? ' active' : '') . '" ' . $href . '">' . $i . '</a></li>';
  }
  echo '</ul></nav>';
}
