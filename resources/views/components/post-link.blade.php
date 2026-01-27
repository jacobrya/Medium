@props(['post'])
<a href="{{route('post.show',[
    'username'=> $post->user->username,
    'post' => $post->slug,
])}}" {{ $attributes->merge(['class' => 'block hover:shadow-md transition-shadow']) }}>{{$slot}}</a>
