@forelse ($address as $item)
@if ($item->facebook != null)
<li><a href="https://www.facebook.com/{{ $item->facebook }}" target="_blank" ><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
@else
<li><a href="#"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
@endif

@if ($item->whatsapp != null)
<li><a href="https://wa.me/{{ $item->whatsapp }}" target="_blank" ><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a></li>
@else
<li><a href="#"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a></li>
@endif

@if ($item->instagram != null)
<li><a href="https://www.instagram.com/{{ $item->instagram }}" target="_blank" ><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
@else
<li><a href="#"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
@endif

@if ($item->youtube != null)
<li><a href="https://www.youtube.com/{{ $item->youtube }}" target="_blank" ><i class="fa-brands fa-youtube" aria-hidden="true"></i></a></li>
@else
<li><a href="#"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a></li>
@endif

@empty
<li><a href="#"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a></li>
@endforelse
