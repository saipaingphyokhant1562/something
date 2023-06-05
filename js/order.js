$(document).ready(function(){
    let price=$("#price").val();
    let total=0;
    $('.total').text(total);
    $(document).on('keyup',"#qty",function()
    {
        // let qty=$("#qty").val();
        // console.log(price)
        //let subtotal=qty*price;
        let pre_col=$(this).parent().prev()
        let price=pre_col.find('.price').val();
        let next_col=$(this).parent().next()
        let subtotal=next_col.find('.subtotal');
        subtotal.val(price*$(this).val())
        let stotal=$('.subtotal').map(function(){
             hello=parseFloat($(this).val());
             return hello
        }).get();
        stotal.forEach(some =>{
        total+=some;
        console.log(total)
        number=parseFloat(total);
        console.log(number)
        $('.total').val(total);
        
        return total;
        });
     })

     $(document).on('click','.remove',function(){
        let remove=$(this).parent().parent().parent().parent();
        remove.remove();
        let subtotalVal = remove.find('.subtotal').val();
        total-=subtotalVal;
        console.log(total);
        $('.total').html(total);
    })

    $(document).on('change','.product',function(){
        let pno=$(this).val();
        let input_price=$(this).parent().next().find('.price');
  
        $.ajax({
            method:'post',
            url:'getPrice.php',
            data:{pid:pno},
            success:function(response)
            {
                input_price.val(response)
            }

        })
    })
    let rowIndex=0;
    $(document).on('click','.addmore',function(event){
        event.preventDefault();
        //let happy=index++;
        //console.log(rowIndex);
        $('.prow').append(`<div class="row " id='hello${(rowIndex++)}' >
        <div class="col-md-12">
          
                <div class="row">
                    <div class="col-md-2">
                        <label for="" class="form-label">Product Name</label>
                        <select name="pname[]" id="" class="form-select product">
                            
                        </select>
                        <span class="text-danger"><?php if(isset($address1_error)) echo $address1_error; ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Price </label>
                        <input type="double" name="price[]" id="price" class="form-control price" value="">
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="qty[]" id="qty" class="form-control" value="" min=1>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Sub Total</label>
                        <input type="double" name="subtotal" id="" class="form-control subtotal" value="">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger remove" name="remove">Remove</button>
                    </div>
                </div>
          
        </div>
    </div>`)

    //$('.some').att("id",index++)
    $.ajax({
        method:'post',
        url:'getProducts.php',
        success:function(response)
        {
            //alert(response)
            $('.product').html(response)
            $('.price').val(price)
        }
    })
    })

})