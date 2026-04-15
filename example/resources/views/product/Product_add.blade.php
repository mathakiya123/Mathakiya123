<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif




    <form action="" method="post" enctype="multipart/form-data" id="proid  ">
    @csrf    
    <h2>Add product</h2>

        <label for="name">name</label>
        <input type="text"   name="name" placeholser="enter product">
        <br><br>
         <label for="name">description</label>
        <input type="text" name="desc" placeholser="enter description">
        <br><br>
        <br> <label for="name">price</label>
        <input type="text" name="price"  placeholser="enter price">
           <br><br>
        <label for="name">images</label>
        <input type="file" name="images"  placeholser="enter images">
           <br><br>
        <!-- //dynamic category -->


<select name="category_id" id="category" class="form-control">
    <option value="">-- Category Chunein --</option>
    @foreach($categories as $category)
     
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
<br>


        <br> 
        <input type="submit" name="submit">
        <br>

        </form>
        <script>


function str1(val){
$.ajax({
    url:"product_add.php",
    type:"post",
    data:{
        name:$('#name').val(),
         desc:$('#desc').val(),
       price:$('#price').val(),
       images:$('#images').val(),
        category_id:$('#caterory_id').val()

    },
    success:function (responce)
    {

        $('#proid').html(val);
    }

}) ;
};
</script>

</body>
</html>