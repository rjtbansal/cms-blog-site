/**
 * Created by rjtba on 2/1/2016.
 */
tinymce.init({ selector:'textarea' });

$(document).ready(function(){
    $("#selectAllCheckboxes").click(function(){
        if(this.checked){
            $(".checkboxes").each(function(){

                this.checked=true;

            });

        }
        else{
            $(".checkboxes").each(function(){
                this.checked=false;
            });
        }
    });


});

function confirmPostDelete(){

    return confirm("Are you sure you want to delete this post");
}

function confirmUserDelete(){
    return confirm("Are you sure you want to delete this user");
}