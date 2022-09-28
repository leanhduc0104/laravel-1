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
    body {
        background-color: #ECEDEE
    }
    .card {
        border: none;
        overflow: hidden
    }
    .thumbnail_images ul {
        list-style: none;
        justify-content: center;
        display: flex;
        align-items: center;
        margin-top: 10px
    }
    .thumbnail_images ul li {
        margin: 5px;
        padding: 10px;
        border: 2px solid #eee;
        cursor: pointer;
        transition: all 0.5s
    }
    .thumbnail_images ul li:hover {
        border: 2px solid #000
    }
    .main_image {
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #eee;
        height: 400px;
        width: 100%;
        overflow: hidden
    }
    .heart {
        height: 29px;
        width: 29px;
        background-color: #EAEAEA;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center
    }
    .content p {
        font-size: 12px
    }
    .ratings span {
        font-size: 14px;
        margin-left: 12px
    }
    .colors {
        margin-top: 5px
    }
    .colors ul {
        list-style: none;
        display: flex;
        padding-left: 0px
    }
    .colors ul li {
        height: 20px;
        width: 20px;
        display: flex;
        border-radius: 50%;
        margin-right: 10px;
        cursor: pointer
    }
    .colors ul li:nth-child(1) {
        background-color: #6C704D
    }
    .colors ul li:nth-child(2) {
        background-color: #96918B
    }
    .colors ul li:nth-child(3) {
        background-color: #68778E
    }
    .colors ul li:nth-child(4) {
        background-color: #263F55
    }
    .colors ul li:nth-child(5) {
        background-color: black
    }
    .right-side {
        position: relative
    }
    .search-option {
        position: absolute;
        background-color: #000;
        overflow: hidden;
        align-items: center;
        color: #fff;
        width: 200px;
        height: 200px;
        border-radius: 49% 51% 50% 50% / 68% 69% 31% 32%;
        left: 30%;
        bottom: -250px;
        transition: all 0.5s;
        cursor: pointer
    }
    .search-option .first-search {
        position: absolute;
        top: 20px;
        left: 90px;
        font-size: 20px;
        opacity: 1000
    }
    .search-option .inputs {
        opacity: 0;
        transition: all 0.5s ease;
        transition-delay: 0.5s;
        position: relative
    }
    .search-option .inputs input {
        position: absolute;
        top: 200px;
        left: 30px;
        padding-left: 20px;
        background-color: transparent;
        width: 300px;
        border: none;
        color: #fff;
        border-bottom: 1px solid #eee;
        transition: all 0.5s;
        z-index: 10
    }
    .search-option .inputs input:focus {
        box-shadow: none;
        outline: none;
        z-index: 10
    }
    .search-option:hover {
        border-radius: 0px;
        width: 100%;
        left: 0px
    }
    .search-option:hover .inputs {
        opacity: 1
    }
    .search-option:hover .first-search {
        left: 27px;
        top: 25px;
        font-size: 15px
    }
    .search-option:hover .inputs input {
        top: 20px
    }
    .search-option .share {
        position: absolute;
        right: 20px;
        top: 22px
    }
    .buttons .btn {
        height: 50px;
        width: 150px;
        border-radius: 0px !important
    }
</style>
<body>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"> <img src="{{$product->image}}" id="main_product_image" width="300" style="margin-top: 30px;"> </div>
                        <div class="thumbnail_images">
                            <ul id="thumbnail">
                                <li><img onclick="changeImage(this)" src="{{$product->image}}" width="30"></li>
                                <li><img onclick="changeImage(this)" src="{{$product->image}}" width="30"></li>
                                <li><img onclick="changeImage(this)" src="{{$product->image}}" width="30"></li>
                                <li><img onclick="changeImage(this)" src="{{$product->image}}" width="30"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>{{$product->name}}</h3> <span class="heart"><i class='bx bx-heart'></i></span>
                        </div>
                        <div class="mt-2 pr-3 content">
                            <p>{{$product->category}}</p>
                        </div>
                        <h3>${{$product->price}}</h3>
                        <form action="{{route('cart.addcart')}}" method="post">
                            @csrf
                            <div class="mt-3"> <span class="fw-bold">Color</span>
                                <div class="colors">
                                    <ul class="marker">
                                        <select class="form-control form-control-sm" style="width: 100px;" id="color" name="color">
                                            <option value="yellow">yellow</option>
                                            <option value="red">red</option>
                                            <option value="black">black</option>
                                            <option value="white">white</option>
                                            <option value="blue">blue</option>
                                            <option value="green">green</option>
                                        </select>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3"> <span class="fw-bold">Sizes</span>
                                <div class="colors">
                                    <ul class="marker">
                                        <select class="form-control form-control-sm" style="width: 100px;" id="size" name="size">
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3"> <span class="fw-bold">Quantity</span>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" style="width:100px" min="1" value="1" >
                                </div>
                            </div>
                            <input type="hidden" name="id" value ="{{$product->id}}" >
                            <div class="buttons d-flex flex-row mt-5 gap-3"><button type="submit" class="btn btn-dark">Add to Basket</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function changeImage(element) {
        var main_prodcut_image = document.getElementById('main_product_image');
        main_prodcut_image.src = element.src;
    }
</script>
</html>