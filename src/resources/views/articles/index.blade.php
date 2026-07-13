@extends('layouts.app')

@section('content')


<style>

.article-wrapper{
    background:#f7faf1;
    padding:50px 0;
}


.article-container{
    max-width:1200px;
    margin:auto;
    padding:0 30px;
}



.article-hero{

    background:linear-gradient(120deg,#eef5dd,#cfe6a8);
    border-radius:35px;
    padding:45px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:40px;

}



.article-left{

    width:50%;

}



.article-label{

    color:#6b8e23;
    font-weight:bold;
    letter-spacing:5px;

}



.article-title{

    font-size:55px;
    font-weight:900;
    color:#1f3a20;
    margin:15px 0;

}



.article-desc{

    font-size:18px;
    color:#555;
    line-height:1.7;

}



.article-image{

    width:45%;

}


.article-image img{

    width:100%;
    border-radius:30px;

}





.article-grid{

    margin-top:40px;

    display:grid;
    grid-template-columns:repeat(2,1fr);

    gap:30px;

}



.article-card{

    background:white;

    border-radius:30px;

    overflow:hidden;

    border:1px solid #e2ead2;

}



.article-card img{

    width:100%;
    height:250px;

    object-fit:cover;

}



.article-content{

    padding:25px;

}



.article-name{

    font-size:25px;
    font-weight:900;

    color:#234018;

}



.article-text{

    color:#666;
    line-height:1.6;

}



.article-btn{

    display:inline-block;

    margin-top:15px;

    color:#2d5016;

    font-weight:bold;

}



</style>




<div class="article-wrapper">


<div class="article-container">



<div class="article-hero">


<div class="article-left">


<div class="article-label">
ARTIKEL
</div>


<h1 class="article-title">
{{ $hero?->title ?? 'Artikel Edukasi Matcha' }}
</h1>


<p class="article-desc">
{{ $hero?->subtitle ?? 'Baca informasi menarik tentang matcha, grade, karakter rasa, manfaat, dan cara menikmati matcha dengan lebih baik.' }}
</p>



</div>



<div class="article-image">

@if ($hero?->image_url)
<img src="{{ $hero->image_url }}">
@else
<div class="flex h-64 items-center justify-center rounded-[30px] bg-gradient-to-br from-[#eef5dd] to-[#cfe6a8]">
    <span class="text-4xl font-black text-[#31572c]">📖</span>
</div>
@endif

</div>


</div>






<div class="article-grid">



@foreach($articles as $article)



<div class="article-card">



@if($article->thumbnail_url)

<img src="{{ $article->thumbnail_url }}">


@else

<img src="{{ asset('images/articles/default-article.webp') }}">


@endif





<div class="article-content">


<h2 class="article-name">

{{ $article->title }}

</h2>



<p class="article-text">

{{ Str::limit($article->excerpt ?? $article->content,120) }}

</p>



<a
href="{{ route('articles.show',$article) }}"
class="article-btn"
>

Baca Selengkapnya →

</a>



</div>



</div>



@endforeach




</div>




</div>


</div>



@endsection
