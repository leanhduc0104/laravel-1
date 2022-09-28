<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #F4F4F4;
}
.wrapper{
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
}
.h3{
    margin-bottom: 0;
}
div.text-uppercase{
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.1rem;
}
.btn#sub{
    font-size: 0.8rem;
    font-weight: 700;
    border: 1px solid #ddd;
}
.btn#sub:hover{
    background-color: #333;
    color: #FFF;
    border: 1ps solid #333;
}
.fa-cog{
    color: #A8A8A8;
    font-size: 0.8rem;
}
.ml-auto.btn:hover span{
    color: #333;
}
div.btn{
    padding: 8px 20px;
}
.notification{
    background-color: #54E346;
    padding: 0px 10px;
}
.notification button.btn{
    background-color: inherit;
    box-shadow: none;
}
.close{
    font-size: 1rem;
    font-weight: normal;
    opacity: 1;
}
.close:hover{
    color: #EEE;
}
.alert-dismissible .close{
    position: unset;
}
button:focus{
    outline: none;
}
.h4{
    margin: 0;
}
.editors{
    position: relative;
}
.editors img{
    object-fit: cover;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 5px solid #FFF;
}
#img1,#img2,#img3{
    position: absolute;
}
#img1{
    top: -15px;
    left: -50px;
}
#img2{
    top: -15px;
    left: -70px;
}
#img3{
    top: -15px;
    left: -90px;
}
div.text-muted{
    font-size: 0.9rem;
}
.table{
    overflow: hidden;
}
.table thead tr th{
    letter-spacing: 0.08rem;
    font-weight: normal;
}
.table tr td,
.table tr th{
    border: none;
    text-align: center;
}
.table.activitites thead{
    border-bottom: 1px solid #54E346;
    font-size: 0.8rem;
    font-weight: 700;
}
.table thead{
    font-size: 0.8rem;
    font-weight: 700;
}
.table.activitites{
    position: relative;
}
.table.activitites thead::after{
    position: absolute;
    content: "RECENT ACTIVITIES";
    background: #FFF;
    padding: 0px 8px;
    top: 38px;
    letter-spacing: 0.08rem;
    font-size: 0.6rem;
    color: #54E346;
    font-weight: 600;
}
.table tbody td.item{
    font-family: 'Dancing Script', cursive;
    font-size: 1.2rem;
    font-weight: 900;
    text-align: left;
}
del{
    font-size: 0.85rem;
}
.red{
    color: #FF0000;
}
div.new{
    font-size: 0.7rem;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: normal;
    letter-spacing: 0.08rem;
    background-color: #C7FDC3;
    color: #0E7504;
    display: inline-block;
}
.table tbody td.item img{
    width: 30px;
    height: 30px;
    object-fit: contain;
}
.table thead th.header{
    text-align: left;
}
.table tbody tr{
    padding-top: 10px;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
    transition: all .4s ease-in-out;
}
.table tbody tr:last-child{
    border: none;
}
td .close,
td .btn{
    opacity: 0;
    background: #fff;
    font-weight: 600;
    font-size: 0.9rem;
}
.table tbody tr:hover{
    transform: scale(1.004);
    box-shadow: 2px 2px 10px #A5A5A5;
    cursor: pointer;
    overflow: hidden;
    scroll-behavior: unset;
}
.table tbody tr:hover .close{
    font-size: 1.5rem;
    opacity: 1;
}
.table tbody tr:hover .close:hover{
    color: #aaa;
}
.table tbody tr:hover .btn{
    border: 1px solid #ddd;
    opacity: 1;
    background: #fff;
}
a{
    font-size: 0.8rem;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: normal;
    visibility: hidden;
}
a:hover{
    text-decoration: none;
}
.table tbody tr:hover a{
    visibility: visible;
}
#commentor2,#commentor3{
    position: absolute;
    object-fit: cover;
}
#commentor1{
    object-fit: cover;
}
#commentor2{
    top: 2px;
    left: 20px;
}
#commentor3{
    top: 2px;
    left: 35px;
}
.comments{
    visibility: visible;
}
hr.items{
    position: relative;
    margin: 0;
    margin-top: 10px;
}
hr.items:after{
    position: absolute;
    content: "ALL ITEMS";
    background: #FFF;
    top: -9px;
    padding: 0px 8px;
    letter-spacing: 0.08rem;
    font-size: 0.6rem;
    font-weight: 600;
}
.subtotal{
    border-bottom-left-radius: 50px;
    background-color: #ccc;
}
.tag,.fa-shoppping-cart{
    font-size: 0.5rem;
}
button.btn{
    background-color: inherit;
}
button.btn:hover{
    background-color: #CECCCC;
    box-shadow: none;
    outline: none;
}
@media(max-width:760px){
    .table.activitites thead::after{
        top: 35px;
    }
}
@media(max-width:576px){
    .table.activitites thead::after{
        top: 55px;
    }
    #img1{
        top: -8px;
        left: 0px;
    }
    #img2{
        top: -8px;
        left: 15px;
    }
    #img3{
        top: -8px;
        left: 30px;
    }
    .editors img{
        width: 20px;
        height: 20px;
        border: 1px solid #FFF;
    }
}
@media(max-width:400px){
    .notification{
        font-size: 0.7rem;
    }
    .close{
        font-size: 0.7rem;
        font-weight: normal;
        opacity: 1;
    }
    .wrapper{
        padding: 10px;
    }
}
</style>
<body>
<div class="wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-column">
                <div class="h3">My lists</div>
            </div>
            <div class="ml-auto btn"><span class="fas fa-cog"></span></div>
            <div class="btn" id="sub">
                Home
            </div>
        </div>
        <div id="table" class="bg-white rounded">
            <div class="d-md-flex align-items-md-center px-3 pt-3">
                <div class="d-flex flex-column">
                    <div class="h4 font-weight-bold">Cart</div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table activitites">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase header">item</th>
                            <th scope="col" class="text-uppercase">Quantity</th>
                            <th scope="col" class="text-uppercase">price each</th>
                            <th scope="col" class="text-uppercase">size</th>
                            <th scope="col" class="text-uppercase">color</th>
                            <th scope="col" class="text-uppercase">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($carts)
                        @foreach($carts as $index => $cart)
                            <tr>
                                <td class="item">
                                    <div class="d-flex">
                                        <img src="{{$cart->product->image}}"
                                            alt="">
                                        <div class="pl-2">
                                            {{$cart->product->name}}
                                            <div class="text-uppercase new"><span class="fas fa-star"></span>new</div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <div class="text-muted">{{$cart->product->category}}</div>
                                                <div><a href="#"><span class="red text-uppercase"><span
                                                                class="fas fa-comment pr-1"></span>add a comment</span></a>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td>{{$cart->quantity}}</td>
                                <td class="d-flex flex-column"><span class="black">${{$cart->product->price}}</span>
                                </td>
                                <td>
                                    {{$cart->size}}
                                </td>
                                <td>
                                    {{$cart->color}}
                                </td>
                                <td class="font-weight-bold">
                                    {{$cart->getTotal()}}
                                    <div class="close">&times;
                                        <input type="hidden" value="{{$index}}" name="delete">
                                    </div>
                                </td>
                                {{-- <input type="hidden" value="{{$cart->product->id}}"> --}}
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="text-muted">
                <button class="btn" type="button" data-toggle="collapse" data-target="#table" aria-expanded="false"
                    aria-controls="table">
                    Hide
                    <span class="fas fa-minus"></span>
                </button>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).on('click','.close',function(){
        $closeParent = $(this).parent();
        $id = $closeParent.find('input').val();
        $.ajax({
            type: 'GET',
            url : "{{URL::to('delete')}}",
            data: {
                'id' : $id
            },
            success:function(data){
                $('tbody').html(data);
                //$('#total').html(data.data1);
            },
            error: function(){
              $('#title').html('he');
            }
        });
    });
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    $('#sub').click(function(){
        $link = 'home';
        window.location.replace($link);
    });
</script>
</html>