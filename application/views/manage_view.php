<hr>
<h4>ADD BOOK</h4>
<form autocomplete="on" id="add_book_form">
    <table id="add_book_table">
        <tr>
            <th>Book No.	</th>
            <th>Book Title 	</th>
            <th>Author 		</th>
            <th>Description </th>
            <th>Publisher 	</th>
            <th>Publish Date</th>
            <th>Tags 		</th>
        </tr>
        <tr>
            <td><input type="text" name="book_no" id="add_book_no" placeholder="Book Number" required autofocus pattern="[A-Za-z0-9]+"></td>
            <td><input type="text" name="book_title" id="add_book_title" placeholder="Book Title" required pattern="[-A-Za-z0-9]+"/></td>
            <td><input type="text" name="author" id="add_author" placeholder="Author" pattern="[A-Za-z]+[-]?[A-Za-z]+"/></td>
            <td><textarea name="description" id="add_description" placeholder="Description"  ></textarea></td>
            <td><input type="text" name="publisher" id="add_publisher" placeholder="Publisher"  /></td>
            <td><input type="date" name="date_published" id="add_date_published" placeholder="Date Published" /></td>
            <td><input type="text" name="tags" id="add_tags" placeholder="Tags" pattern="^[-a-zA-Z0-9]+{\,[a-zA-Z0-9]+}*"/></td>
            <td><button type="submit" name="add_button" id="add_button">Add Button</button></td>
        </tr>
        <tr>
            <td><span name = "book_no_msg"></span></span></td>
            <td> <span name = "book_title_msg"></span></td>
            <td> <span name = "author_msg"></span></td>
            <td> <span name = "description_msg"></span></td>
            <td> <span name = "publisher_msg"></span></td>
            <td> <span name = "date_published_msg"></span></td>
            <td> <span name = "tags_msg"></span></td>
        </tr>
    </table>
</form>
<hr/>
<h4>EDIT BOOK</h4>
<form name="edit_book" id="edit_book_form" method="post">
    <fieldset>
        <legend>Personal Information</legend>

        <label for="book_no">Book No: </label>
        <input type="text" name="book_no" id="edit_book_no" required autofocus pattern="[A-Za-z0-9]+ /><span name="help_book_no"> </span>
        </br>
        <label for="book_title">Book Title: </label>
        <input type="text" name="book_title" id="edit_book_title" required pattern="[-A-Za-z0-9]+ /><span name="help_book_title"> </span>
        </br>

        <label for="book_status">Book Status: </label>
        <select name="book_status" id="edit_book_status">
            <option value = "available"> Available </option>
            <option value = "reserved"> Reserved </option>
            <option value = "borrowed"> Borrowed </option>
        </select>
        <span name="help_book_status"> </span>
        <br />

        <label for="description">Book Description: </label></br>
        <textarea name="description" id="edit_description"size=50 maxlength=255 placeholder="Description"></textarea><span name="help_book_description"> </span><br />

        <label for="publisher">Book Publisher: </label>
        <input type="text" name="publisher" id="edit_publisher" placeholder="Publisher" /><span name="help_book_publisher"> </span><br />

        <label for="author">Book Author: </label>
        <input type="text" name="author" id="edit_author"  pattern="[A-Za-z]+[-]?[A-Za-z]+ /><span name="help_book_author"> </span>
        </br>
        Tags:
        <input type="text" name="tags" id= "edit_tags"placeholder="Tags"required pattern="^[-a-zA-Z0-9]+{\,[a-zA-Z0-9]+}*/><span name="help_tags"></span><br/>
        Date Published:
        <input type="date" name="date_published" id="edit_date_published" /> <span name="help_date_published"> </span>
        <br/>
        <input type="submit" id="submit_edit" name="submit_edit"/>
    </fieldset>
</form>