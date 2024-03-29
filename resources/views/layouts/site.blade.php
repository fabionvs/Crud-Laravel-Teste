<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Document</title>
</head>
<body>


<div class="wrap">
    <div class="menu">
        <div class="mini-menu">
            <ul>
                <li class="sub">
                    <a href="#">WOMAN</a>
                    <ul>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Blazers</a></li>
                        <li><a href="#">Suits</a></li>
                        <li><a href="#">Trousers</a></li>
                        <li><a href="#">Jenas</a></li>
                        <li><a href="#">Shirts</a></li>
                    </ul>
                </li>
                <li class="sub">
                    <a href="#">MAN</a>
                    <ul>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Blazers</a></li>
                        <li><a href="#">Suits</a></li>
                        <li><a href="#">Trousers</a></li>
                        <li><a href="#">Jenas</a></li>
                        <li><a href="#">Shirts</a></li>
                    </ul>
                </li>
                <li class="sub">
                    <a href="#">KIDS</a>
                    <ul>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Blazers</a></li>
                        <li><a href="#">Suits</a></li>
                        <li><a href="#">Trousers</a></li>
                        <li><a href="#">Jenas</a></li>
                        <li><a href="#">Shirts</a></li>
                    </ul>
                </li>
                <li class="sub">
                    <a href="#">Shoes&Bags</a>
                    <ul>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Blazers</a></li>
                        <li><a href="#">Suits</a></li>
                        <li><a href="#">Trousers</a></li>
                        <li><a href="#">Jenas</a></li>
                        <li><a href="#">Shirts</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu-colors menu-item">
            <div class="header-item" >Colors</div>
            <ul class="color-row1">
                <li class="color-circle" style="background:#4286f4"></li>
                <li class="color-circle" style="background:#2acc4b"></li>
                <li class="color-circle" style="background:#343534"></li>
                <li class="color-circle" style="background:#5f605f"></li>
                <li class="color-circle" style="background:#929392"></li>
            </ul>
            <ul class="color-row2">
                <li class="color-circle" style="background:#9e8045"></li>
                <li class="color-circle" style="background:#d3d3d3"></li>
                <li class="color-circle" style="background:#6b6666"></li>
                <li class="color-circle" style="background:#999797"></li>
                <li class="color-circle" style="background:#923476"></li>
            </ul>
        </div>
        <div class="menu-size menu-item">
            <div class="header-item" >Size</div>
            <ul class="color-row1">
                <li class="color-circle size-circle" ><p class="sizedouble">XS</p></li>
                <li class="color-circle size-circle" style="background-color:#343534" ><p style="color:#999" class="size">S</p></li>
                <li class="color-circle size-circle" ><p class="size">M</p></li>
                <li class="color-circle size-circle" ><p class="size">L</p></li>
                <li class="color-circle size-circle" ><p class="sizedouble">XL</p></li>
            </ul>
        </div>
        <div class="menu-price menu-item">
            <div class="header-item" >Price</div>
            <p>
                <!--<label for="amount">Price range:</label>-->
                <input type="text" readonly id="amount"  style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
        </div>

    </div>

    <div class="items">

        <div class="items">
            <div data-price="290" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$290</h5>
                </div>
            </div>
            <div data-price="900" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item" ></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$900</h5>
                </div>
            </div>
            <div data-price="600" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$600</h5>
                </div>
            </div>
            <div data-price="457" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$457</h5>
                </div>
            </div>
            <div data-price="674" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$647</h5>
                </div>
            </div>
            <div data-price="315" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$315</h5>
                </div>
            </div>
            <div data-price="987" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$987</h5>
                </div>
            </div>
            <div data-price="777" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$777</h5>
                </div>
            </div>
            <div data-price="504" class="item">
                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item"></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$504</h5>
                </div>
            </div>
        </div>
        <button class="loadmore">Load More</button>
    </div>
</div>
</body>

<!--<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>-->





<!--Menu-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".sub > a").click(function() {
            var ul = $(this).next(),
                clone = ul.clone().css({"height":"auto"}).appendTo(".mini-menu"),
                height = ul.css("height") === "0px" ? ul[0].scrollHeight + "px" : "0px";
            clone.remove();
            ul.animate({"height":height});
            return false;
        });
        $('.mini-menu > ul > li > a').click(function(){
            $('.sub a').removeClass('active');
            $(this).addClass('active');
        }),
            $('.sub ul li a').click(function(){
                $('.sub ul li a').removeClass('active');
                $(this).addClass('active');
            });
    });
</script>
<script src="script.js" ></script>
</html>
<script>
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 1000,
            values: [ 190, 728 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                var mi = ui.values[0];
                var mx = ui.values[1];
                filterSystem(mi, mx);
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    } );


    function filterSystem(minPrice, maxPrice) {
        $(".items div.item").hide().filter(function () {
            var price = parseInt($(this).data("price"), 10);
            return price >= minPrice && price <= maxPrice;
        }).show();
    }

    //   $( "#slider-range" ).on( "slidechange", function( event, ui ) {
    //     console.log(ui.value);
    // } );
</script>