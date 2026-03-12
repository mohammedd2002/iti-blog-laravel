<div>
    @php
        
    if($type === 'primary'){
        $class = 'text-blue-600 hover:underline mr-3';
    }elseif($type === 'secondary'){
        $class = 'text-green-600 hover:underline mr-3';
    }elseif($type === 'danger'){
        $class = 'text-red-600 hover:underline';
    }
    @endphp

<a href="{{ $route }}" class="{{ $class }}">
    {{ $name }}
</a>
  
</div>  