<?php
/**
 * Created by PhpStorm.
 * User: isnalla
 * Date: 2/3/14
 * Time: 4:55 PM
 */
?>
<script>
    $(document).ready(function(){

        //delete button
        $('.delete_button').on('click',function(){
            var result = confirm("Confirm deleting this book");
            if (result==true) {
                var bookNo = $(this).attr('bookno');
                $(this).closest('tr').remove();
                $.post('index.php/booker/delete',{book_no:bookNo},function(data){
                    //callback function for delete
                });
            }
        });

        function addBook(event){
            event.preventDefault();  /* stop form from submitting normally */

            if(checkAll()){
                var date = $('#add_date_published').val();
                var data = {
                    book_no : $('#add_book_no').val(),
                    book_title : $('#add_book_title').val(),
                    description : $('#add_description').val(),
                    publisher : $('#add_publisher').val(),
                    date_published : date,
                    tags : $('#add_tags').val(),
                    author : $('#add_author').val()
                };

                $.post("index.php/booker/add",$('#add_book_form').serialize(),function(data){
                    console.log(data);
                });
                $('#add_book_form')[0].reset();
            }
        }

        $('#add_book_form').submit(addBook);

        $('.edit_button').on('click',function(event){
            var td = $(this).closest('tr').find('td[book_data=book_no]');
            var book_no = td.text();

            console.log(book_no);

            $.post("index.php/booker/get_book",{'book_no':book_no},function(data){
                    var data=JSON.parse(data);
                    data = data[0];
                    console.log(data);
                    var form = $("#edit_book_form");
                    $(form).find("#edit_book_no").val(data.book_no);
                    $(form).find("#edit_book_title").val(data.book_title);
                    $(form).find("#edit_book_status").val(data.status);
                    $(form).find("#edit_description").val(data.description);
                    $(form).find("#edit_publisher").val(data.publisher);
                    // $(form).find("#edit_author").val(data.author);

                   // var date_p=data.date_published.replace(/-/g,"/");
                 console.log($(form).find("#edit_date_published"));
                    $(form).find("#edit_date_published")[0].value=data.date_published;
                    $(form).find("#edit_tags").val(data.tags);
            });

        });

        function datify(id,value){
            console.log(value);
            var str = '<input type="date" id="edit_'+id+'" value="'+value+'"/>';
            console.log(str);
            return str;
        }

        function selectify(id,selected){
            var str = '<select id="edit_book_status"> <option value="available" '+isSelected('available',selected)+'>available</option>'+
                ' <option value="reserved" '+isSelected('reserved',selected)+'>reserved</option> '+
                '<option value="borrowed" '+isSelected('borrowed',selected)+'>borrowed</option> </select>';

            return str;
        }

        function isSelected(value,inputVal){
            if(value == inputVal) return 'selected';
            else return '';

        }

        function inputify(id,value){
            if(value == undefined) value = "";
            return '<input type="text" id="edit_'+id+'" value="'+value+'" />';
        }
    });
</script>
</body>
</html>