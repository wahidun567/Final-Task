@if($flash=session('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <ul>
    <li>{{ session('gagal')[0] }}</li>
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($flash=session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ $flash }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($flash=session('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ $flash }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($flash=session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ $flash }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($flash = session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $flash }}
    {{-- @foreach ( $validate as $validate )
        <ul>
            <li>{{ $validate }}</li>
        </ul>
    @endforeach --}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($flash=session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $flash }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif