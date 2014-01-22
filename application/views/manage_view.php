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
    <form action="index.php/booker/add" method="get" name="add_form">
        <input type="text" name="book_no" id="book_no"/>
        <input type="text" name="book_title" id="book_title"/>
        <!--input type="text" name="status" id="status"-->

        <input type="text" name="description" id="description"/>
        <input type="text" name="publisher" id="publisher"/>
        <input type="date" name="date_published" id="date_published"/>
        <input type="submit" name="add_submit" id="add_submit">
    </form>
    <hr>
    <form action="index.php/booker/delete" method="get" name="del_form">
        <input type="text" name="book_no" id="book_no_del"/>
        <input type="submit" name="submit" id="del_submit">
    </form>
    <hr>
    <table id="sample_table" name="sample_table">
        <tr>
            <th>book_no</th>
            <th>book_title</th>
            <th>status</th>
            <th>description</th>
            <th>publisher</th>
            <th>date_published</th>
            <th>actions</th>
        </tr>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>available</td>
            <td>d</td>
            <td>e</td>
            <td>f</td>
            <td>
                <button name="edit">edit</button>
            </td>
        </tr>
        <tr>
            <td>g</td>
            <td>h</td>
            <td>reserved</td>
            <td>i</td>
            <td>j</td>
            <td>k</td>
            <td>
                <button name="edit">edit</button>
            </td>
        </tr>
        <tr>
            <td>l</td>
            <td>m</td>
            <td>reserved</td>
            <td>o</td>
            <td>p</td>
            <td>q</td>
            <td>
                <button name="edit">edit</button>
            </td>
        </tr>
    </table>

    <form action="index.php/booker/edit" method="get" name="edit_form">
        <!--input type="text" name="book_no_edit" id="book_no_edit"/-->
        <input type="text" value="a" name="prev_book_no" id="prev_book_no" hidden/>
        <br> book number : <input type="text" name="book_no" id="book_no" />
        <br> book title : <input type="text" name="book_title" id="book_title" />
        <br> description : <input type="text" name="description" id="description"/>
        <br> publisher : <input type="text" name="publisher" id="publisher"/>
        <br> date published : <input type="date" name="date_published" id="date_published"/>
        <input type="submit" name="save_edit_submit" id="save_edit_submit">
    </form>

    <script>
        var buttons = document.getElementsByName('edit');
        console.log(buttons);
        var i = 0;
        var length = buttons.length;
        for(i=0;i<length; i++){
            buttons[i].setAttribute("onclick","edit(event)");
        }

        function edit(event){

            event.preventDefault();


            console.log(event);
        }
    </script>
</body>
</html>