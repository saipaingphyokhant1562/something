$(document).ready(function(){
    $(document).on('click','.delete',function(){
        let status=confirm("Are you sure you want to delete?");
        let tr=$(this).parent().parent();
        let id=tr.attr('id');
        console.log(id);
        if(status)
        {
            $.ajax({
                method:'post',
                url:'delete_employee.php',
                data:{id:id},
                success:function(response)
                {
                    //alert(response);
                    if(response=="success")
                    {
                        location.href="employees_.php";
                        //tr.remove();
                    }
                }
            })
        }
    })

})