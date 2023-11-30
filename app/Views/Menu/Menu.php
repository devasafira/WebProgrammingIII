<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combined File</title>
    
    <style>
        {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #f3f3f3;
    font-family: 'Poppins',sans-serif;
}
.menu{
    padding: 0;
    display: grid;
    grid-template-columns: repeat( auto-fit, minmax(250px,1fr));
    grid-gap: 20px 40px;
}
.heading{
    background-color: #cb202d;
    color: #ffffff;
    margin-bottom: 30px;
    padding: 20px 0 10px 0;
    grid-column: 1/-1;
    text-align: center;
}
.heading>h1{
    font-weight: 400;
    font-size: 30px;
    letter-spacing: 10px;
    margin-bottom: 10px;
}
.heading>h3{
    font-weight: 600;
    font-size: 22px;
    letter-spacing: 5px;
}
.mennu{
  width: 100%;
  padding: 70px 0;
}
.mennu .controls{
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
  flex-wrap: wrap;
  padding: 50px 0;
}
.mennu .controls .buttons{
  font-size: 1.4rem;
  margin: 10px;
  border-radius: 50px;
  background-color: #e4dada;
  display: inline-block;
  color: #000;
  cursor: pointer;
  border: 1px solid #ccc;
  padding: 0.5rem 1rem;
  text-decoration: none;
  box-shadow: 0 3px 5px rgba(0,0,0,.3);
}
.mennu .controls .buttons.active{
  background: rgb(99, 83, 64);
  color:whitesmoke;
}
.tmbl_menu{
    background-color: #cb202d;
    border: none;
    color: #ffffff;
    font-size: 20px;
    font-weight: 600;
    border-radius: 5px;
    width: 250px;
    text-align: center;
}
.tmbl_menu:hover {
	background: linear-gradient(to right, #ccc 0%, rgb(185, 176, 164) 100%);
	transform: scale(1.2); 
}
.food-items{
    display: grid;
    position: relative;
    grid-template-rows: auto 1fr;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    margin: 0 20px;
}
.food-items img{
    position: relative;
    width: 100%;
    border-radius: 15px 15px 0 0;
}
.drink-items{
    display: grid;
    position: relative;
    grid-template-rows: auto 1fr;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    margin: 0 20px;
}
.drink-items img{
    position: relative;
    width: 100%;
    border-radius: 15px 15px 0 0;
}
.details{
    padding: 20px 10px;
    display: grid;
    grid-template-rows: auto 1fr 50px;
    grid-row-gap: 15px;
}
.details-sub{
    display: grid;
    grid-template-columns: auto auto;
}
.details-sub>h5{
    font-weight: 600;
    font-size: 20px;
}
.details>p{
    color: #000000;
    font-size: 20px;
    line-height: 28px;
    font-weight: 400;
    align-self: stretch;
}
.wrapper{
    height: 50px;
    min-width: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e4dada;
    border-radius: 10px;
}
.wrapper span{
    width: 100%;
    text-align: center;
    font-size: 30px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
}
.wrapper span.num{
    font-size: 25px;
    pointer-events: none;
}
</style>
</head>

<body>
<div class="menu">
        <div class="heading">
            <h1>SUSHI</h1>
            <h3>&mdash; MENU &mdash; </h3>
            <div class="mennu" id="Menu">
                <ul class="controls">
                    <li class="buttons active" data-filter="all">Show all</li>
                    <li class="buttons" data-filter="makanan">Makanan</li>
                    <li class="buttons" data-filter="minuman">Minuman</li>
                </ul>
                
            </div>
        </div>
        <?php if (empty($sushiMenus) && empty($minuman)) : ?>
            <div class="text-center">
                <h2>Tidak ada menu yang tersedia</h2>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($sushiMenus)):?>
        <?php foreach ($sushiMenus as $menu) : ?>
        <div class="food-items menu_card makanan" data-category="makanan">
        <img src="<?= base_url('uploads/' . $menu['gambar']); ?>" class="card-img-top" alt="Menu Image">
            <div class="details">
                <div class="details-sub">
                    <h5><?= $menu ['nama_menu'];?></h5>
                </div>
                <p><?= $menu['harga']; ?></p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                </div>
                <form action="/pesan" method="post">
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                        <div class="input-group mb-3">
                            <button class="btn btn-success" type="submit" name="submit">Pesan</button>
                            <input type="number" class="form-control" name="quantity" min="0" max="<?= $menu['stok']; ?>">
                        </div>
                </form>
                <span class="badge bg-info text-dark"><?= $menu['stok']; ?> tersisa</span>
                <span class="badge bg-info text-dark"><?= $menu['harga']; ?> harga</span>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif;?>

        

        <div class="food-items menu_card makanan" data-category="makanan">
            <img src="SAKURA-KANI-MAYO-SUSHI.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Sakura Kani Mayo Sushi</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="food-items menu_card makanan" data-category="makanan">
            <img src="EBI-SUSHI.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Ebi Sushi</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="food-items menu_card makanan" data-category="makanan">
            <img src="ROASTED-SALMON.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Roasted Salmon</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="drink-items menu_card minuman" data-category="minuman">
            <img src="LYCHEE-TEA.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Lychee Tea</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="drink-items menu_card minuman" data-category="minuman">
            <img src="LEMON-TEA.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Lemon Tea</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="drink-items menu_card" data-category="minuman">
            <img src="HOKKAIDO-MATCHA-MACCHIATO.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Hokkaido Matcha Macchiato</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="drink-items menu_card minuman" data-category="minuman">
            <img src="HOKKAIDO-MILK-TEA.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Hokkaido Milk Tea</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="drink-items menu_card minuman" data-category="minuman">
            <img src="HOKKAIDO-TARO-MACCHIATO.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Hakkoido Taro Macchiato</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>
            </div>
        </div>

        <div class="drink-items menu_card minuman" data-category="minuman">
            <img src="BLUE-OCEAN-MOJITO.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Blue Ocean Mojito</h5>
                </div>
                <p>RP.10.000</p>
                <div class="wrapper">
                    <span class="minus" onclick="decrement(this)">-</span>
                    <span class="num">1</span>
                    <span class="plus" onclick="increment(this)">+</span>
                  </div>
                  <a href="#" class="tmbl_menu">Pesan Sekarang</a>  
            </div>
        </div>

        <script>
            function increment(element) {
              const numElement = element.parentNode.querySelector(".num");  
              let currentNum = parseInt(numElement.textContent, 10);
              numElement.textContent = currentNum + 1;
            }
      
            function decrement(element) {
              const numElement = element.parentNode.querySelector(".num");
              let currentNum = parseInt(numElement.textContent, 10);
              if (currentNum > 1) {
                numElement.textContent = currentNum - 1;
              }
            }
        </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  linestack = document.querySelector(".line-stack");
  linestack.onclick = function(){
    navbar = document.querySelector(".nav-bar");
    navbar.classlist.toggle("active");
  }
</script>
<script>
    $(document).ready(function(){
      $(".buttons").click(function(){
        $(this).addClass("active").siblings().removeClass("active")

        var filter = $(this).attr("data-filter");
        if (filter == "all"){
          $(".menu_card").show();
        }else{
          $(".menu_card").not("."+filter).hide();
          $(".menu_card").filter("."+filter).show();
        }
      });
    });

$(document).ready(function () {
    $(".buttons").click(function () {
        $(this).addClass("active").siblings().removeClass("active");

        var filter = $(this).attr("data-filter");

        // Tampilkan semua elemen dengan kelas "menu_card"
        $(".menu_card").show();

        // Jika filter bukan "all", sembunyikan elemen dengan kelas yang tidak sesuai dengan filter
        if (filter !== "all") {
            $("food-items menu_card").not("." + filter).hide();
        }
    });
});
</script>
</body>
</html>