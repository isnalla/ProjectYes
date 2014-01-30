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

        <script>
            var str, msg;
            function main(){    //for validation
                add_book.book_no.onblur = validateBookNo;
                add_book.book_title.onblur = validateText;
                add_book.description.onblur = validateDescription;
                add_book.publisher.onblur = validatePublisher;
                add_book.date_published.onblur = validateDatePublished;
                checkAll;
            }

            function validateBookNo(){
                str = add_book.book_no.value;
                msg = "";
                if(str == ""){
                    msg+="Book no is required.";
                }//else if(!str.match(/^[+]\([0-9]{12}\)$/) ){
                else if(!str.match(/[0-9][a-zA-Z]$/)){
                    msg+="Wrong Input";
                }
                else if(msg == "Invalid input: "){
                    msg = "";
                }
                document.getElementsByName("book_no_msg")[0].innerHTML = msg;

                if(msg == ""){
                    return true;
                }
            }
            function validateText(){
                str = add_book.book_title.value;
                msg = "";
                if(str == ""){
                    msg+="Book title is required.";
                }
                else if(!str.match(/^[a-zA-Z]+$/)){
                    msg+="Wrong Input";
                }
                else if(msg == "Invalid input: "){
                    msg = "";
                }
                document.getElementsByName("book_title_msg")[0].innerHTML = msg;

                if(msg == ""){
                    return true;
                }
            }
            function validateDescription(){
                str = add_book.description.value;
                msg = "";
                if(str == ""){
                    msg+="Description is required.";
                }
                document.getElementsByName("description_msg")[0].innerHTML = msg;

                if(msg == ""){
                    return true;
                }
            }
            function validatePublisher(){
                str = add_book.publisher.value;
                msg = "";
                if(str == ""){
                    msg+="Publisher is required.";
                }
                document.getElementsByName("publisher_msg")[0].innerHTML = msg;

                if(msg == ""){
                    return true;
                }
            }
            function validateDatePublished(){
                str = add_book.date_published.value;
                msg = "";
                if(str == ""){
                    msg+="Date is required.";
                }
                document.getElementsByName("date_published_msg")[0].innerHTML = msg;

                if(msg == ""){
                    return true;
                }
            }
            function checkAll(){
                if(validateText() && validateBookNo() && validateDescription() && validatePublisher() && validateDatePublished() )
                {
                    //enable disbled button
                    document.getElementById['add_submit'].disabled = false;
                }

            }

        </script>
    </head>
    <body onload = main()>
        <div>
             <!--table of books-->
        </div>
        <table name = "add_book">
            <th>ADD BOOK</th>
            <tr>
                <form method="get" name="add_book">
                    <td><input type="text" name="book_no" id="book_no"/></td>
                    <td><input type="text" name="book_title" id="book_title"/></td>
                    <td>
                        <select>
                            <option value = "available"> Available </option>
                            <option value = "ewan"> ewan </option>
                            <option value = "borrowed"> Borrowed </option>
                         </select>
                    </td>
                    <td><input type="text" name="description" id="description"/></td>
                    <td><input type="text" name="publisher" id="publisher"/></td>
                    <td><input type="date" name="date_published" id="date_published"/></td>
                    <td><input type="submit" name="add_submit" id="add_submit" disabled = "disabled"></td>
                </form>
            </tr>
            <tr>
                <td><span name = "book_no_msg"></span></span></td>
                <td> <span name = "book_title_msg"></span></td>
                <td></td>
                <td> <span name = "description_msg"></span></td>
                <td> <span name = "publisher_msg"></span></td>
                <td> <span name = "date_published_msg"></span></td>
                <td></td>
            </tr>
        </table>
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
                    <button name="edit" class="edit">edit</button>
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
                    <button name="edit" class="edit">edit</button>
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
                    <button name="edit" class="edit">edit</button>
                </td>
            </tr>
        </table>
        <hr>

    </form>

        <script src="http://localhost/ProjectYes/jquery-1.11.0.js"></script>
        <script>
            $(document).ready(function(){

                $('.edit').on('click',edit);

                function edit(event){

                    var row = $(this).closest('tr');
                    var book_no = $('row');
                }

            });
        </script>
    </body>
</html>