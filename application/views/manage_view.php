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
        else if(!str.match(/[0-9a-zA-Z]$/)){
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
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var year = today.getFullYear();

        msg = "";
        if(str == ""){
            msg+="Date is required.";
        }
        else if(str.getFullYear()>=year){
            if(str.getMonth()+1 >= mm){
                if(str.getDate() > dd){
                    msg+="Wrong date.";
                }
                else{
                    msg+="Wrong date.";
                }
            }
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

<script>
    var str, msg;
    function main(){    //for validation
        edit_book.book_no.onblur = edit_validateBookNo;
        edit_book.book_title.onblur = edit_validateText;
        edit_book.book_desc.onblur = edit_validateDescription;
        edit_book.book_publisher.onblur = edit_validatePublisher;
        edit_book.date_published.onblur = edit_validateDatePublished;
        edit_book.book_author.onblur = edit_validateAuthor;
        checkAll;
    }

    function edit_validateBookNo(){
        str = edit_book.book_no.value;
        msg = "";
        if(str == ""){
            msg+="Book no is required.";
        }//else if(!str.match(/^[+]\([0-9]{12}\)$/) ){
        else if(!str.match(/[0-9a-zA-Z]$/)){
            msg+="Wrong Input";
        }
        else if(msg == "Invalid input: "){
            msg = "";
        }
        document.getElementsByName("help_book_no")[0].innerHTML = msg;

        if(msg == ""){
            return true;
        }
    }
    function edit_validateText(){
        str = edit_book.book_title.value;
        msg = "";
        if(str == ""){
            msg+="Book title is required.";
        }
        else if(!str.match(/[0-9a-zA-Z\ \.\-\!]+$/)){
            msg+="Wrong Input";
        }
        else if(msg == "Invalid input: "){
            msg = "";
        }
        document.getElementsByName("help_book_title")[0].innerHTML = msg;

        if(msg == ""){
            return true;
        }
    }
    function edit_validateDescription(){
        str = edit_book.book_desc.value;
        msg = "";
        if(str == ""){
            msg+="Description is required.";
        }
        document.getElementsByName("help_book_description")[0].innerHTML = msg;

        if(msg == ""){
            return true;
        }
    }
    function edit_validatePublisher(){
        str = edit_book.book_publisher.value;
        msg = "";
        if(str == ""){
            msg+="Publisher is required.";
        }
        document.getElementsByName("help_book_publisher")[0].innerHTML = msg;

        if(msg == ""){
            return true;
        }
    }
    function edit_validateAuthor(){
        str = edit_book.book_author.value;
        msg = "";
        if(str == ""){
            msg+="Author is required.";
        }
        document.getElementsByName("help_book_author")[0].innerHTML = msg;

        if(msg == ""){
            return true;
        }
    }
    function edit_validateDatePublished(){
        str = edit_book.date_published.value;

        msg = "";
        if(str == ""){
            msg+="Date is required.";
        }
        else if(str > Date()){

            msg+="Wrong date.";
        }
        document.getElementsByName("help_date_published")[0].innerHTML = msg;
        if(msg == ""){
            return true;
        }
    }
    function checkAll(){
        if(edit_validateText() && edit_validateBookNo() && edit_validateDescription() && edit_validatePublisher() && edit_validateDatePublished() && edit_validateAuthor()){
            //enable disbled button
            document.getElementById['edit_submit'].disabled = false;
        }

    }

</script>
<body onload = main()>
    <div>
         <!--table of books-->
    </div>
    <table name = "add_book">
        <th>ADD BOOK</th>
        <tr>
            <form method="get" name="add_book">
                <td>Book Number<input type="text" name="book_no" id="book_no"/></td>
                <td>Book Title<input type="text" name="book_title" id="book_title"/></td>
                <td>Status
                    <select>
                        <option value = "available"> Available </option>
                        <option value = "ewan"> ewan </option>
                        <option value = "borrowed"> Borrowed </option>
                     </select>
                </td>
                <td>Description<input type="text" name="description" id="description"/></td>
                <td>Publisher<input type="text" name="publisher" id="publisher"/></td>
                <td>Date Published<input type="date" name="date_published" id="date_published"/></td>
                <td>Tags<input type="text" name="tags" id="tags"/></td>
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
    <hr>
    EDIT BOOK
    <form name="edit_book">
        <fieldset>
            <legend>Personal Information</legend>

            <label for="book_no">Book No: </label>
            <input type="text" name="book_no" id="book_no" /><br/><span name="help_book_no"> </span></br>
            <br /><br />

            <label for="book_title">Book Title: </label>
            <input type="text" name="book_title" id="book_title" /><br/><span name="help_book_title"> </span></br>
            <br /><br />

            <label for="book_status">Book Status: </label>
            <select name="book_status" id="book_status">
                <option value = "available"> Available </option>
                <option value = "reserved"> Reserved </option>
                <option value = "borrowed"> Borrowed </option>
            </select>
            <span name="help_book_status"> </span>
            <br /><br />

            <label for="book_description">Book Description: </label></br>
            <textarea name="book_desc" id="book_desc"size=50 maxlength=255></textarea><br/><span name="help_book_description"> </span></br>
            <br /><br />

            <label for="book_publisher">Book Publisher: </label>
            <input type="text" name="book_publisher" id="book_publisher" /><br/><span name="help_book_publisher"> </span></br>
            <br /><br />

            <label for="book_author">Book Author: </label>
            <input type="text" name="book_author" id="book_author" /><br/><span name="help_book_author"> </span></br>
            <br /><br />

            Date Published:
            <input type="date" name="date_published" /> <span name="help_date_published"> </span> </br>

        </fieldset>

        <input type="submit"/>

    </form>
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
    <hr>


    <form action="index.php/booker/edit" method="get" name="edit_form">
        <!--input type="text" name="book_no_edit" id="book_no_edit"/-->
        <input type="text" value="a" name="prev_book_no" id="prev_book_no" hidden/>
        <br> Book Number : <input type="text" name="book_no" id="book_no" />
        <br> Book Title : <input type="text" name="book_title" id="book_title"  />
        <br> Description : <input type="text" name="description" id="description"/>
        <br> Publisher : <input type="text" name="publisher" id="publisher"/>
        <br> Date Published : <input type="date" name="date_published" id="date_published"/>
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