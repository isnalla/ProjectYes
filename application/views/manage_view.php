<?php
/**
 * Created by PhpStorm.
 * User: isnalla
 * Date: 1/15/14
* Time: 6:47 PM
*/
?>
<html>
<head>
    <title><?php echo $title ?></title>
</head>
<body>
    <div>
         <!--table of books-->
    </div>
    <form method="get" name="add_form">
        <input type="text" name="book_no" id="book_no"/>
        <input type="text" name="book_title" id="book_title"/>
        <input type="text" name="status" id="status"/>
        <input type="text" name="description" id="description"/>
        <input type="text" name="publisher" id="publisher"/>
        <input type="date" name="date_published" id="date_published"/>
        <input type="submit" name="add_submit" id="add_submit">
    </form>
    <hr>
    <form method="get" name="del_form">
        <input type="text" name="book_no_del" id="book_no_del"/>
        <input type="submit" name="del_submit" id="del_submit">
    </form>

</body>
</html>