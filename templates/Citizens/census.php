<h1>Перепись</h1>
<div class="panel panel-primary">

  <div class="panel-body">
    <form id="frm-citizen">
        <div>
            <label for="input_name">Имя</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="input_age">Возраст</label>
            <input type="number" name="age">
        </div>
        <div>
            <button class="btn btn-primary" id="frm-add-citizen">Добавить</button>
            <button class="btn btn-primary" id="frm-edit-citizen">Изменить</button>
        </div>
     </form>
  </div>

</div>
<div class="panel panel-primary">
  <div class="panel-body">

    <ul class="list-group">
        <?php
        if (count($citizens) > 0) {
          foreach ($citizens as $index => $data) {
        ?>
            <li class="list-group-item"><?= $data->name ?> <?= $data->age ?> <a href="javascript:void(0)" class="btn btn-danger btn-delete-citizen" data-name="<?= $data->name ?>">x</a></li>
        <?php
          }
        }
        ?>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-body">
    <div>Переписано человек: <?php echo count($citizens); ?></div>
    <div>Общий возраст: <?php
            echo implode(array_reduce($citizens, function($acc, $element)
            {
                if (isset($acc)) {
                    $acc["age"] += $element["age"];
                } else {
                    $acc["age"] = $element["age"];
                }
                return $acc;
            }));
        ?>
    </div>
  </div>
</div>
