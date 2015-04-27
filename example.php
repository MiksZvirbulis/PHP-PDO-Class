<?php
/*
    Calling class on variable $db (this can be any variable name). Find construction calls below in order:
    1. Database host address
    2. Username for authentication
    3. Password for authentication
    4. Database name

    Please note: the data array is NOT required. All question marks (?) found in the query will be replaced with the data (in order) found in the array of the second parameter.
    You do NOT need to use quotes as PDO sorts this out for you during query preperation.
*/
$db = new db("localhost", "root", "password", "database");

$id = 1;

/*
    Calling a query which will return only ONE row. Usage: (query, array with data)
    Returns an array.
*/
$db->fetch("SELECT * FROM `table` WHERE `id` = ?", array($id));

/*
    Calling a query which will return multiple rows. Usage: (query, array with data)
    Returns an array.
*/
$db->fetchAll("SELECT * FROM `table` ORDER BY `id` ASC");

/*
    Calling a query which will return the total count of rows. Usage: (query, array with data)
    Returns an integer.
*/
$db->count("SELECT `id` FROM `table`");

/*
    Calling a query which will insert a row in to a table. This can also create a table. Usage: (query, array with data)
*/
$db->insert("INSERT INTO `table` (`id`) VALUES (?)", array($id));

/*
    Calling a query which will update a row in the table. Usage: (query, array with data)
*/
$db->update("UPDATE `table` SET `id` = ? WHERE `id` = ?", array(69, $id));

/*
    Calling a query which will delete a row in the table. Usage: (query, array with data)
*/
$db->delete("DELETE FROM `table` WHERE `id` = ?", array($id));

/*
    Calling a query which will determine if a table exists in the database. Usage: (table name)
    Returns true or false.
*/
echo ($db->tableExists("table") === true) ? "Table exists." : "Table does NOT exist.";