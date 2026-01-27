@props(['post'])
<a href="{{route('post.show',[
    'username'=> $post->user->username,
    'post' => $post->slug,
])}}" {{ $attributes->merge(['class' => 'transition-shadow']) }}>{{$slot}}</a>
