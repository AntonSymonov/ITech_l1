<?php 
 include('connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
</head>
<body>
    <h4>Симонов Антон. Вариант №3, КИУКИ-19-1</h4>
    <p>Получить перечень палат, в которых дежурит выбранная медсестра:</p>
    <form action="1.php" method = "GET">
        <select name="name">
            <?php
            $sql = 'SELECT DISTINCT `name` FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[name] </option>";
            }
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>  

    <p>Получить перечень медсёстр, выбранного отделения:</p>
    <form action="2.php" method = "GET">
        <select name="department">
            <?php
            $sql = 'SELECT DISTINCT department FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[department] </option>";
            }
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>  

    <p>Получить перечень палат в указанную смену:</p>
    <form action="3.php" method = "GET">
        <select name="shift">
            <?php
            $sql = 'SELECT DISTINCT shift FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[shift] </option>";
            }
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>  

    <br>
    <p>Добавление медсестры</p>
    <form action="insert1.php" method="GET">
        <p>Введите имя медсестры</p>
        <input required type="text" name = "nurseName">
        <p>Выберите дату дежурства</p>
        <input required type="date" name="date"/>
        <p>Выберите отделение</p>
        <select name = "department">
         <?php $sql = 'SELECT DISTINCT department FROM nurse';
        foreach($dbh->query($sql) as $row)
        {   
             print "<option> $row[department] </option>";
        }?>
        </select>
        <p>Выберите смену</p>
        <select name = "shift">
        <?php $sql = 'SELECT DISTINCT shift FROM nurse';
        foreach($dbh->query($sql) as $row)
        {   
             print "<option> $row[shift] </option>";
        }?>
        </select>
    <br><br>
    <input type="submit" value="Добавить">
    </form>  

    <br>
    <p>Добавление палаты</p>
    <form action="insert2.php" method="GET">
    <p>Введите название палаты</p>
    <input required type="text" name = "wardName">
    <br><br>
    <input type="submit" value ="Добавить">
    </form>

    <br>
    <p>Назначить выбранной медсестре указанную палату</p>
    <form action="insert3.php" method="GET">
    <p>Выберите медсестру</p>
    <select name = "nurseName">
        <?php $sql = 'SELECT `name` FROM nurse';
            foreach($dbh->query($sql) as $row)
            {
                print "<option> $row[name] </option>";
            }
        ?>
    </select>
    <p>Выберите палату</p>
    <select name = "wardName">
        <?php $sql = 'SELECT `name` FROM ward';
        foreach($dbh->query($sql) as $row)
        {   
             print "<option> $row[name] </option>";
        }?>
    </select>
    <br><br>
    <input type="submit" value ="Назначить">
    </form>

</body>
</html>