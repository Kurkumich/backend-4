<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'submit.php'; ?>

    <div class="container">
        <?php
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            echo '<div class="errors">';
            foreach ($_SESSION['errors'] as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
        } elseif (isset($_COOKIE['name'])) {
            echo '<div class="success">';
            echo '<p>Форма успешно отправлена</p>';
            echo '</div>';
        }
        ?>

        <h1>Форма</h1>
        <form action="submit.php" method="POST" id="form">
            <label for="name">Имя:</label>
            <?= showError('name') ?>
            <input type="text" name="name" id="name" value="<?= getFieldValue('name') ?>">

            <label for="email">E-mail:</label>
            <?= showError('email') ?>
            <input type="text" name="email" id="email" value="<?= getFieldValue('email') ?>">

	           <br />
			<select name="year" id="year" >
				<option value="<?= getSelected('year', "") ?>">Выберите год</option>
			</select>
			<br />
            <?= showError('birth_year') ?>
            <input type="text" name="birth_year" id="birth_year" value="<?= getFieldValue('birth_year') ?>">

            <label>Пол:</label>
            <?= showError('gender') ?>
            <label><input type="radio" name="gender" value="male" <?= getChecked('gender', 'male') ?>> Мужской</label>
            <label><input type="radio" name="gender" value="female" <?= getChecked('gender', 'female') ?>> Женский</label>

            <label>Количество конечностей:</label>
            <?= showError('limbs') ?>
            <input type="text" name="limbs" id="limbs" value="<?= getFieldValue('limbs') ?>">
<label for="abilities">Сверхспособности:</label>
            <select name="abilities[]" id="abilities" multiple>
                <option value="immortality" <?= getSelected('abilities', 'immortality') ?>>Бессмертие</option>
                <option value="wall_pass" <?= getSelected('abilities', 'wall_pass') ?>>Прохождение сквозь стены</option>
                <option value="levitation" <?= getSelected('abilities', 'levitation') ?>>Левитация</option>
            </select>

            <label for="bio">Биография:</label>
            <textarea name="bio" id="bio"><?= getFieldValue('bio') ?></textarea>

            <label>
                <input type="checkbox" name="contract" value="accepted" <?= getChecked('contract', 'accepted') ?>> С контрактом ознакомлен
            </label>

            <input type="submit" value="Отправить">
        </form>
        				<script>
              const select = document.getElementById('year');
              const currentYear = new Date().getFullYear();
              for (let i = currentYear; i >= currentYear - 100; i--) {
                  const option = document.createElement('option');
                  option.value = i;
                  option.text = i;
                  if(i == <?= isset($_COOKIE['year']) ? $_COOKIE['year'] : '""' ?>) 
                     {
                     option.selected = true;
                     }
                  select.add(option);
}

    </script>
    </div>
</body>
</html>
