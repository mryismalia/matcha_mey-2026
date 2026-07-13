<div class="bg-[#f7faf1] py-16">


<section class="max-w-7xl mx-auto px-6">


{{-- HERO --}}

<div class="
bg-gradient-to-br
from-[#eef5dd]
to-[#cfe6a8]
rounded-[40px]
p-10
grid
md:grid-cols-2
gap-10
items-center
">


<div>


<span class="
text-[#6b8e23]
font-bold
tracking-[4px]
">
MATCHA EDUCATION
</span>



<h1 class="
mt-5
text-5xl
font-black
text-[#234018]
">

{{ $about['matcha']['title'] }}

</h1>



<p class="
mt-5
text-lg
leading-relaxed
text-gray-600
">

{{ $about['matcha']['description']->content }}

</p>





<div class="
mt-8
grid
grid-cols-2
md:grid-cols-4
gap-5
">


<div class="text-center">

<div class="
w-14
h-14
mx-auto
rounded-full
bg-white
flex
items-center
justify-center
text-3xl
">
🌿
</div>

<p class="
mt-3
text-sm
font-bold
text-[#315b1c]
">
100% Teh Hijau
<br>
Alami
</p>


</div>





<div class="text-center">

<div class="
w-14
h-14
mx-auto
rounded-full
bg-white
flex
items-center
justify-center
text-3xl
">
🎋
</div>

<p class="
mt-3
text-sm
font-bold
text-[#315b1c]
">
Tradisi Jepang
<br>
Berkualitas
</p>


</div>







<div class="text-center">

<div class="
w-14
h-14
mx-auto
rounded-full
bg-white
flex
items-center
justify-center
text-3xl
">
🍵
</div>

<p class="
mt-3
text-sm
font-bold
text-[#315b1c]
">
Aroma Segar
<br>
Menenangkan
</p>


</div>







<div class="text-center">

<div class="
w-14
h-14
mx-auto
rounded-full
bg-white
flex
items-center
justify-center
text-3xl
">
♡
</div>

<p class="
mt-3
text-sm
font-bold
text-[#315b1c]
">
Minuman
<br>
Dessert
</p>


</div>



</div>


</div>







<div>


@if ($about['matcha']['description']?->image_url)
<img
src="{{ $about['matcha']['description']->image_url }}"
class="
rounded-[35px]
shadow-xl
w-full
h-96
object-cover
"
>
@else
<div class="flex h-96 items-center justify-center rounded-[35px] bg-gradient-to-br from-[#eef5e5] to-[#bad18b] shadow-xl">
    <span class="text-4xl font-black text-[#31572c]">Matcha</span>
</div>
@endif


</div>


</div>







{{-- GRADE --}}


<div class="
mt-10
bg-white
rounded-[35px]
p-8
grid
md:grid-cols-2
gap-8
items-center
border
border-[#e2ead2]
">


<div>

@if ($about['grade']['description']?->image_url)
<img
src="{{ $about['grade']['description']->image_url }}"
class="
rounded-[30px]
w-full
h-64
object-cover
bg-[#f1f6e7]
"
>
@else
<div class="flex h-64 items-center justify-center rounded-[30px] bg-[#f1f6e7]">
    <span class="text-3xl font-black text-[#31572c]">Grade</span>
</div>
@endif


</div>



<div>


<h2 class="
text-4xl
font-black
text-[#234018]
">

{{ $about['grade']['title'] }}

</h2>



<p class="
mt-5
text-gray-600
leading-relaxed
text-lg
">

{{ $about['grade']['description']->content }}

</p>


</div>


</div>








{{-- TASTE --}}


<div class="
mt-8
bg-white
rounded-[35px]
p-8
grid
md:grid-cols-2
gap-8
items-center
border
border-[#e2ead2]
">



<div>


<h2 class="
text-4xl
font-black
text-[#234018]
">

{{ $about['taste']['title'] }}

</h2>



<p class="
mt-5
text-gray-600
leading-relaxed
text-lg
">

{{ $about['taste']['description']->content }}

</p>


</div>




<div>

@if ($about['taste']['description']?->image_url)
<img
src="{{ $about['taste']['description']->image_url }}"
class="
rounded-[30px]
w-full
h-64
object-cover
bg-[#f1f6e7]
"
>
@else
<div class="flex h-64 items-center justify-center rounded-[30px] bg-[#f1f6e7]">
    <span class="text-3xl font-black text-[#31572c]">Rasa</span>
</div>
@endif


</div>



</div>



</section>


</div>
