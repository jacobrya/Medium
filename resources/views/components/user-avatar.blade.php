@props(['user'])
@if($user->image)
    <img class='h-20 w-20 rounded-full object-cover' src="{{Storage::url($user->image)}}">
@else
    <img class='h-20 w-20 rounded-full object-cover' src="https://www.shutterstock.com/shutterstock/photos/1290549613/display_1500/stock-vector-vector-illustration-of-avatar-and-dummy-sign-collection-of-avatar-and-image-stock-vector-1290549613.jpg">
@endif
