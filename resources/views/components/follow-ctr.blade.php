@props(['user'])
<div {{$attributes}} x-data="{
following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
followerCount: {{ $user->followers->count() }},
follow() {
axios.post('{{ route('follow', $user) }}')
.then(res => {
this.following = !this.following;
this.followerCount = res.data.followers_count;
})
.catch(err => console.log(err));
}
}"
class="w-[320px] border-l px-8">
    {{$slot}}
</div>
