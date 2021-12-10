//const baseUrl = 'http://laravel.v84';
// function for show books without refresh
showBooks();
// table row with ajax
function table_book_row(res){
    let htmlView = '';
    if(res.books.length <= 0){
        htmlView+= `
        <tr>
          <td colspan="4">No data.</td>
         </tr>`;
    }
    for(let i = 0; i < res.books.length; i++){
        htmlView += `
          <tr>
             <td>`+ (i+1) +`</td>
             <td>`+res.books[i].title+`</td>
              <td>`+res.books[i].author+`</td>
                 <td>`+res.books[i].code+`</td>

              <td>
                <button id="editModal" data-action="`+baseUrl+`/book/`+res.books[i].id+`/update" data-id="`+res.books[i].id+`" class="btn btn-warning btn-sm">Edit</button>
<button id="btn-delete" data-id="`+res.books[i].id+`" class="btn btn-danger btn-sm">Delete</button>
</td>
</tr>
`;
    }
    $('#tbody').html(htmlView);
}
function showBooks(){
    console.log(baseUrl+'/book');
    $.ajax({
        type : 'GET',
        dataType: "json",
        url  : baseUrl+'/book',
        success : function (res) {
            table_book_row(res);
        },error : function(error){
            console.log(error);
        }
    })
}

//當開啟modal時
$('button#openModal').click(function() {
    let url = $(this).data('action'); //button data-action 網址
    $('#exampleModal').modal('show');
    $('#formData').trigger("reset"); //清空值
    $('#formData').attr('action',url); //來源網址
})
// Event for created and updated books
$('#formData').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        type: 'POST',
        data : formData,
        contentType: false,
        processData: false,
        url: $(this).attr('action'),
        beforeSend:function(){
            $('#btn-create').addClass("disabled").html("Processing...").attr('disabled',true);
            $(document).find('span.error-text').text('');
        },
        complete: function(){
            $('#btn-create').removeClass("disabled").html("Save   Change").attr('disabled',false);
        },
        success: function(res){
            console.log(res);
            if(res.success == true){
                $('#formData').trigger("reset");
                $('#exampleModal').modal('hide');
                showBooks(); // call function show Books
                Swal.fire(
                    'Success!',
                    res.message,
                    'success'
                )
            }
        },
        error(err){
            $.each(err.responseJSON,function(prefix,val) {
                $('.'+prefix+'_error').text(val[0]);
            })
            console.log(err);
        }
    })
})
//open edit modal
$(document).on('click','button#editModal',function() {
    let id = $(this).data('id');
    let dataAction = $(this).data('action');
    $('#formData').attr('action',dataAction);
    $.ajax({
        type: 'GET',
        url : baseUrl+`/book/${id}/edit`,
        dataType: "json",
        success: function(res) {
            $('input[name=title]').val(res.book.title);
            $('input[name=code]').val(res.book.code);
            $('textarea[name=author]').val(res.book.author);
            $('#exampleModal').modal('show');
            console.log(res);
        },
        error:function(error) {
            console.log(error)
        }
    })
})
$(document).on('click','button#btn-delete',function(e) {
    e.preventDefault();
    let dataDelete = $(this).data('id');
// console.log(dataDelete);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this! ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:'DELETE',
                dataType: 'JSON',
                url: baseUrl+`/book/${dataDelete}/delete`,
                data:{
                    '_token':$('meta[name="csrf-token"]').attr('content'),
                },
                success:function(response){
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    showBooks();
                },
                error:function(err){
                    console.log(err);
                }
            });
        }
    })
});
