@extends('layouts.app')

@section('content')

<style>

.catalog-wrapper{
    background:#f7faf1;
    padding:50px 0;
}


.catalog-container{
    max-width:1200px;
    margin:auto;
    padding:0 30px;
}



.catalog-hero{

    background:linear-gradient(
        120deg,
        #eef5dd,
        #cfe6a8
    );

    border-radius:35px;

    padding:45px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:40px;

}




.catalog-left{

    width:50%;

}



.catalog-label{

    color:#6b8e23;

    font-weight:bold;

    letter-spacing:5px;

}




.catalog-title{

    font-size:55px;

    font-weight:900;

    color:#1f3a20;

    margin:15px 0;

}




.catalog-desc{

    font-size:18px;

    color:#555;

    line-height:1.7;

}




.feature-list{

    display:flex;

    gap:25px;

    margin-top:35px;

}



.feature{

    text-align:center;

}



.feature-icon{

    width:60px;

    height:60px;

    border-radius:50%;

    background:white;

    border:1px solid #c8d9a8;

    display:flex;

    justify-content:center;

    align-items:center;

    margin:auto;

    font-size:25px;

}



.feature p{

    font-size:13px;

    font-weight:bold;

    color:#2d5016;

}





.catalog-image{

    width:45%;

}



.catalog-image img{

    width:100%;

    border-radius:30px;

    object-fit:cover;

}






.card-grid{

    margin-top:40px;

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:25px;

}




.matcha-card{

    background:white;

    border-radius:30px;

    padding:25px;

    display:flex;

    gap:25px;

    border:1px solid #e2ead2;

}



.matcha-image{

    width:150px;

    height:150px;

    background:#f1f6e7;

    border-radius:25px;

    overflow:hidden;

    display:flex;

    align-items:center;

    justify-content:center;

}



.matcha-image img{

    width:100%;

    height:100%;

    object-fit:contain;

}




.tag{

    background:#eef4df;

    padding:6px 15px;

    border-radius:20px;

    font-size:12px;

    font-weight:bold;

    color:#2d5016;

}




.matcha-name{

    font-size:24px;

    font-weight:900;

    color:#234018;

    margin-top:15px;

}




.matcha-desc{

    color:#666;

    line-height:1.6;

}




.detail-btn{

    display:inline-block;

    margin-top:15px;

    color:#2d5016;

    font-weight:bold;

}





.suitable{

    margin-top:40px;

    background:#eef4df;

    border-radius:30px;

    padding:30px;

}




.suitable-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

}



.suitable-item{

    text-align:center;

    border-right:1px solid #bfd29a;

}



.suitable-item:last-child{

    border:none;

}


</style>





<div class="catalog-wrapper">


<div class="catalog-container">





{{-- HERO --}}

<div class="catalog-hero">



<div class="catalog-left">



<div class="catalog-label">
KATALOG
</div>




<div class="catalog-title">
Katalog Jenis Matcha
</div>




<div class="catalog-desc">

Temukan berbagai jenis matcha dengan karakter rasa,
grade, origin, dan rekomendasi penggunaan terbaik.

</div>




<div class="feature-list">



<div class="feature">

<div class="feature-icon">
🌿
</div>

<p>
100% Teh Hijau<br>
Alami
</p>

</div>




<div class="feature">

<div class="feature-icon">
🎋
</div>

<p>
Tradisi Jepang<br>
Berkualitas
</p>

</div>





<div class="feature">

<div class="feature-icon">
🍵
</div>

<p>
Aroma Segar<br>
Menenangkan
</p>

</div>




<div class="feature">

<div class="feature-icon">
♡
</div>

<p>
Cocok Untuk<br>
Minuman & Dessert
</p>

</div>



</div>



</div>





<div class="catalog-image">


<img
src="{{ asset('images/matcha/about-matcha.png') }}"
alt="Matcha"
>


</div>




</div>



















{{-- CARD --}}


<div class="card-grid">



@foreach($matchas as $matcha)



<div class="matcha-card">



<div class="matcha-image">



<img src="{{ asset('storage/'.($matcha->image ?? 'catalog/ceremonial-matcha.png')) }}">



</div>





<div>


<span class="tag">
Matcha Japan
</span>




<div class="matcha-name">

{{ $matcha->name }}

</div>




<p class="matcha-desc">

{{ $matcha->description }}

</p>





<a

href="{{ route('matchas.show',$matcha) }}"

class="detail-btn"

>
Lihat Detail →
</a>



</div>




</div>



@endforeach



</div>









{{-- SUITABLE --}}


<div class="suitable">


<h2 style="
font-size:25px;
font-weight:900;
color:#234018;
">

Cocok untuk:

</h2>




<div class="suitable-grid">



<div class="suitable-item">

<h1>☕</h1>

<b>
Matcha Latte
</b>

</div>




<div class="suitable-item">

<h1>🥤</h1>

<b>
Blended Drink
</b>

</div>





<div class="suitable-item">

<h1>🍰</h1>

<b>
Dessert
</b>

</div>




<div class="suitable-item">

<h1>👨‍🍳</h1>

<b>
Baking
</b>

</div>



</div>



</div>






</div>

</div>

@endsection
